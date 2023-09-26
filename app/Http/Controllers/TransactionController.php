<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;
use App\Traits\SendSMSTrait;
use App\Payments\TBCpayment;
use App\Payments\PayzePayment;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\TransactionSuccessMailOwner;
use App\Mail\TransactionSuccessMailClient;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use SendSMSTrait;

    public function createTransaction($company_name, $id)
    {
        $order = Order::where('id', '=', $id)->first();
        $company = User::where('id', '=', $order->user_id)->first();
        $price = $order->price + $order->tip;
        if ($order->promo_percentage) {
            $price = $order->price / $order->promo_percentage + $order->tip;
        }

        $transaction = new Transaction;


        if ($order->payment_method == 1) {
            $api_config = (object) [
                'apiKey' => $company->tbc_secret,
                'apiSecret' => $company->tbc_key,
            ];

            try {
                $payment = new TBCpayment($api_config);
                $tbc_transaction = $payment->createOrder((object) $order);
                $transaction->pay_id = $tbc_transaction->payId;

                if ($tbc_transaction === null) {
                    throw new Exception("Error while trying to make tbcnew order");
                }
            } catch (Throwable $e) {
                return response()->json([
                    'status' => 'tbc payment error',
                    'message' => 'when order is not redirect payment page'
                ]);
            }
        } elseif ($order->payment_method == 2) {

            if ($price < 1) {
                return redirect()->back()->withErrors(['msg' => 'amount is less than 1']);
            }
            if ($company->payze == 1) {
                $config = (object) [
                    'apiKey' => $company->payze_key,
                    'apiSecret' => $company->payze_secret,
                    'amount' => $price,
                    'payzeIndex' => $company->payze,
                    'payzeIban' => "GE81BG0000000498412415"
                ];
            } else {
                $config = (object) [
                    'apiKey' => "",
                    'apiSecret' => "",
                    'amount' => $price,
                    'payzeIndex' => $company->payze,
                    'payzeIban' => $company->payze_iban
                ];
            }

            $payment = new PayzePayment($config);
            $payzeTransaction = $payment->pay($config);
            $transaction->pay_id = $payzeTransaction->payId;
        }

        $transaction->user_id = $order->user_id;
        $transaction->order_id = $id;
        $transaction->currency = $order->currency;
        $transaction->name = $order->name;
        $transaction->email = $order->email;
        $transaction->number = $order->number;
        $transaction->pay_method = $order->payment_method;
        $transaction->session_token = $order->session_token;
        $transaction->total = $price;
        $transaction->save();
        if ($order->payment_method == 1) {
            return redirect($tbc_transaction->redirect);
        } elseif ($order->payment_method == 2) {
            return redirect($payzeTransaction->redirect);
        }
    }


    public function callback($id)
    {
        $transaction = Transaction::find($id);
        $user = User::find($transaction->user_id);
        $ownerData = (object)[
            'merchant' => $user->shop_name,
            'id' => $transaction->id,
            'transaction_id' => $transaction->pay_id,
            'price' => $transaction->total,
            'client_name' => $transaction->name,
            'client_mail' => $transaction->email,
            'client_number' => $transaction->number,
            'create_date' => $transaction->created_at
        ];

        $clientData = (object)[
            'merchant' => $user->shop_name,
            'id' => $transaction->id,
            'transaction_id' => $transaction->pay_id,
            'price' => $transaction->total,
            'merchant_name' => $user->name,
            'merchant_email' => $user->email,
            'merchant_number' => $user->number,
            'create_date' => $transaction->created_at
        ];


        if ($transaction->pay_method == 1) {
            $api_config = (object) [
                'apiKey' => $user->tbc_secret,
                'apiSecret' => $user->tbc_key

            ];
            $data = (object)[
                'payId' => $transaction->pay_id,
                'total' => $transaction->total
            ];
            $payment = new TBCpayment($api_config);
            $tbc_status = $payment->transactionStatus((object) $data);
            $status = $tbc_status->status;

            if ($status === "Succeeded") {
                $transaction->transaction_status = 1;
                Mail::to($user->email)->send(new TransactionSuccessMailOwner((object) $ownerData));
                Mail::to($transaction->email)->send(new TransactionSuccessMailclient((object) $clientData));
                $this->sendSMS($user->number, 'Shopeasy.ge : თქვენს ვებსაიტზე : '. $user->shop_name .'.shopeasy.ge მოხდა პროდუქტის შესყიდვა ', $user->id);
                $this->sendSMS($transaction->number, 'თქვენ მოახდინეთ პროდუქტის შესყიდვა ვებსაიტზე : '. $user->shop_name .'.shopeasy.ge. გადახდის ID: '. $transaction->pay_id  . ' შეკვეთის დეტალური ინფორმაციას მიიღებთ მეილზე: '.$transaction->email , $user->id);
            } else if ($status == "Created") {
                $transaction->transaction_status = 0;
            } else if ($status == "Expired" || $status == "Failed") {
                $transaction->transaction_status = -2;
            } else if ($status == "Returned") {
                $transaction->transaction_status = -1;
            }
        } else if ($transaction->pay_method == 2) {
            $data = (object)[
                'payId' => $transaction->pay_id,
                'total' => $transaction->total
            ];
            if ($user->payze == 1) {
                $config = (object) [
                    'payId' => $transaction->pay_id,
                    'apiKey' => $user->payze_key,
                    'apiSecret' => $user->payze_secret,

                ];
            } else if ($user->payze == 2) {
                $config = (object) [
                    'payId' => $transaction->pay_id,
                    'apiKey' => "",
                    'apiSecret' => "",
                ];
            }
            $payment = new PayzePayment($config);
            $payze_status = $payment->get((object) $config);
            $payze_status = $payment->getOrderStatus((object) $data);
            $status = $payze_status->status;
            if ($status === "Captured") {
                $transaction->transaction_status = 1;
                Mail::to($user->email)->send(new TransactionSuccessMailOwner($ownerData));
                Mail::to($transaction->email)->send(new TransactionSuccessMailclient($clientData));
                $this->sendSMS($user->number, 'თქვენs ვებსაიტზე : '. $user->shop_name .'.shopeasy.ge მოხდა პროდუქტის შესყიდვა. გადახდის ID: '. $transaction->pay_id . ' შეკვეთის დეტალური ინფორმაციას მიიღებთ მეილზე: '. $user->email , $user->id);
                $this->sendSMS($transaction->number, 'თქვენ მოახდინეთ პროდუქტის შესყიდვა ვებსაიტზე : '. $user->shop_name .'.shopeasy.ge. გადახდის ID: '. $transaction->pay_id  . ' შეკვეთის დეტალური ინფორმაციას მიიღებთ მეილზე: '.$transaction->email , $user->id);

            } else if ($status == "Draft") {
                $transaction->transaction_status = 0;
            } else if ($status == "Blocked" || $status == "Rejected" || $status == "Timeout") {
                $transaction->transaction_status = -2;
            } else if ($status == "Refunded") {
                $transaction->transaction_status = -1;
            }
        }

        $transaction->update();

        return Redirect::to('https://' . $user->shop_name . '.shopeasy.ge');
    }

    public function refound($company_name, $id)
    {
        $transaction = Transaction::find($id);
        if ($transaction->created_at > Carbon::now()->subHour(24)) {
            $user = User::find($transaction->user_id);
            if ($user->id == Auth::user()->id  && $transaction->transaction_status == 1) {
                if ($transaction->pay_method == 1) {
                    $api_config = (object) [
                        'apiKey' => $user->tbc_secret,
                        'apiSecret' => $user->tbc_key
                    ];
                    $data = (object)[
                        'payId' => $transaction->pay_id,
                        'total' => $transaction->total
                    ];
                    $payment = new TBCpayment($api_config);
                    $trans = $payment->refund((object) $data);
                    $tbc_status = $payment->transactionStatus((object) $data);
                    $status = $tbc_status->status;
                    if ($status == "Returned") {
                        $transaction->transaction_status = -1;
                    }
                } elseif ($transaction->pay_method == 2) {

                    $data = (object)[
                        'payId' => $transaction->pay_id,
                        'total' => $transaction->total
                    ];
                    $config = (object) [
                        'payId' => $transaction->pay_id,
                        'apiKey' => $user->payze_key,
                        'apiSecret' => $user->payze_secret
                    ];

                    $payment = new PayzePayment($config);
                    $payze_refound = $payment->refund((object) $config);
                    $payze_status = $payment->get((object) $config);
                    $payze_status = $payment->getOrderStatus((object) $data);
                    $status = $payze_status->status;

                    if ($status == "Refunded") {
                        $transaction->transaction_status = -1;
                    }
                }
            }
            $transaction->save();
        }



        return redirect('/admin/transactions');
    }
}
