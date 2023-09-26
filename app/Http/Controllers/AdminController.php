<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Traits\SendSMSTrait;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Cookie;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    use SendSMSTrait;

    public function dashboardIndex(Request $request)
    {
        $welcome = $request->cookie('welcome');
        if($welcome){
            $welcomeText = 'welcome';
        }
        else{
            $welcomeText = 'null';
        }
        $products = Product::where('user_id', '=', Auth::user()->id)->get();

        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }
        $today = \Carbon\Carbon::now();
        $tbc_profit_week = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(7))->where('transaction_status', 1)->where('pay_method', 1)
            ->sum('total');
        $stripe_profit_week = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(7))->where('transaction_status', 1)->where('pay_method', 2)
            ->sum('total');
        $payze_profit_week = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(7))->where('transaction_status', 1)->where('pay_method', 3)
            ->sum('total');
        $profit_today = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(1))->where('transaction_status', 1)
            ->sum('total');
        $profit_week = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(7))->where('transaction_status', 1)
            ->sum('total');
        $profit_month = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(30))->where('transaction_status', 1)
            ->sum('total');
        $profit_years = Transaction::where('user_id', '=', Auth::user()->id)->where('created_at', '>', Carbon::now()->subDays(365))->where('transaction_status', 1)
            ->sum('total');

        return view('admin.components.dashboard', compact(['tbc_profit_week','products', 'stripe_profit_week', 'payze_profit_week', 'profit_today', 'profit_week', 'profit_month', 'profit_years']))->with('welcome',$welcomeText);
    }

    public function settingIndex()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }

        return view('admin.components.setting');
    }

    public function settingUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->language = $request->language;
        $user->currency = $request->currency;
        // $user->commission_index = $request->commission_index;
        if ($user->image == "logo.png") {
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            if ($request->hasfile('image')) {
                $destination = 'image/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file_resize = Image::make($file->getRealPath());
                $file_resize->fit(250);
                $file_resize->save('image/' . $filename);
                $user->image = "$filename";
            }
            $user->update();
            return redirect()->back()->with('success', 'your message,here');
        } elseif (!$user->facebook && !$user->instagram) {
            if ($request->hasfile('image')) {
                $destination = 'image/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file_resize = Image::make($file->getRealPath());
                $file_resize->fit(250);
                $file_resize->save('image/' . $filename);
                $user->image = "$filename";
            }
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            $user->update();
            return redirect()->back()->with('success', 'your message,here');
        } elseif (!$user->analytics) {
            if ($request->hasfile('image')) {
                $destination = 'image/' . $user->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file_resize = Image::make($file->getRealPath());
                $file_resize->fit(250);
                $file_resize->save('image/' . $filename);
                $user->image = "$filename";
            }
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            $user->analytics = $request->analytics;
            $user->update();
            return redirect()->back()->with('success', 'your message,here');
        }

        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->analytics = $request->analytics;
        if ($request->hasfile('image')) {
            $destination = 'image/' . $user->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file_resize = Image::make($file->getRealPath());
            $file_resize->fit(250);
            $file_resize->save('image/' . $filename);
            $user->image = "$filename";
        }
        $user->update();
        return redirect()->back();
    }

    public function addIban(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->payze_iban = $request->payze_iban;
        $user->payze = 2;

        $user->update();
        return redirect()->back()->with('ibanAdded', 'your message,here');
    }




    public function termsIndex()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }

        return view('admin.components.terms');
    }

    public function termsUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->confidence_policy = $request->confidence_policy;
        $user->return_policy = $request->return_policy;
        $user->terms_condition = $request->terms_condition;
        $user->terms_delivery = $request->terms_delivery;
        $user->update();
        return redirect()->back();
    }

    public function orderIndex()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }
        $timeUp = Carbon::now()->subHour(24);
        $orders = Transaction::where('user_id', '=', Auth::user()->id)->where('transaction_status', '=', '1')->orderBy('id', 'DESC')->get();

        return view('admin.components.orders', compact(['orders', 'timeUp']));
    }

    public function transactionIndex()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }
        $timeUp = Carbon::now()->subHour(24);
        $transactions = Transaction::where('user_id', '=', Auth::user()->id)->get();

        return view('admin.components.transactions', compact(['transactions', 'timeUp']));
    }

    public function paymentMethodIndex()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }
        return view('admin.components.paymentMethod');
    }

    public function paymentUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->tbc || $user->payze || $user->stripe || $user->payze_iban) {
            $user->tbc = $request->tbc;
            $user->tbc_key = $request->tbc_key;
            $user->tbc_secret = $request->tbc_secret;
            // $user->stripe = $request->stripe;
            // $user->stripe_key = $request->stripe_key;
            // $user->stripe_secret = $request->stripe_secret;
            $user->payze = $request->payze;
            $user->payze_key = $request->payze_key;
            $user->payze_secret = $request->payze_secret;
            $user->payze_iban = $request->payze_iban;
            $user->update();
            return redirect('/admin/payment-methods');
        } else {
            $user->tbc = $request->tbc;
            $user->tbc_key = $request->tbc_key;
            $user->tbc_secret = $request->tbc_secret;
            // $user->stripe = $request->stripe;
            // $user->stripe_key = $request->stripe_key;
            // $user->stripe_secret = $request->stripe_secret;
            $user->payze = $request->payze;
            $user->payze_key = $request->payze_key;
            $user->payze_secret = $request->payze_secret;
            $user->payze_iban = $request->payze_iban;
            $user->update();
            return redirect()->back()->with('success', 'your message,here');
        }
    }


    public function additionalOptions()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }

        return view('admin.components.additionalOptions');
    }

    public function additionalUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->additional_info = $request->additional_info;
        $user->tip = $request->tip;
        $user->promo_percentage = $request->promo_percentage;
        $user->delivery_date = $request->delivery_date;

        if(!$user->promo || !$user->promo_code){
            $user->promo = $request->promo;
            $user->promo_code = $request->promo_code;
            $user->update();
            return redirect()->back()->with('success', 'your message,here');
        }

        $user->promo = $request->promo;
        $user->promo_code = $request->promo_code;
        $user->update();

        return redirect('/admin/additional-options');
    }


    public function integration()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }

        return view('admin.components.integration');
    }

    public function integrationUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->sms_office = $request->sms_office;
        $user->sms_name = $request->sms_name;
        $user->sms_token = $request->sms_token;
        $user->messenger = $request->messenger;
        $user->messenger_script = $request->messenger_script;

        if(!$user->analytics_script || !$user->analytics){
            $user->analytics = $request->analytics;
            $user->analytics_script = $request->analytics_script;
            $user->update();
            return redirect()->back()->with('success', 'your message,here');
        }

        $user->analytics = $request->analytics;
        $user->analytics_script = $request->analytics_script;
        $user->update();

        return redirect('/admin/integration');
    }



    public function merchants(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();        
        return view('admin.components.merchants', compact(['users']));
    }
    public function merchantsUpdate(Request $request)
    {
    }



    public function mainPageIndex()
    {
        if (Auth::user()->language) {
            Session::put("locale", Auth::user()->language);
            App::setLocale(Session::get("locale"));
        }

        return view('admin.components.main-page');
    }

    public function mainPageUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->headline = $request->headline;
        $user->design = $request->design;
        $user->description = $request->description;
        if ($request->hasfile('slide')) {
            $destination = 'image/' . $user->slide;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('slide');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file_resize = Image::make($file->getRealPath());
            $file_resize->save('image/' . $filename);
            $user->slide = "$filename";
        }
        $user->update();
        return redirect()->back();
    }
}
