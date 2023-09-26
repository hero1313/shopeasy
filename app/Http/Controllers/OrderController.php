<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $products = Cart::where('session_token', '=', session('_token'))->get();
        if(!$request->name || !$request->email || !$request->number){
            return Redirect::back()->withErrors(['msg' => 'Please fill in all fields'])->withInput(Input::all());
        }
        else if(!$products->first()){
            return Redirect::back()->withErrors(['msg' => 'Please select a product']);
        }
        $product = Product::where('id', '=', $products->first()->product_id)->first();
        $user = User::where('id', '=', $product->user_id)->first();
        $order = new Order;
        $order->user_id = $user->id;
        $order->session_token = session('_token');
        $order->product_id = $request->product_radio;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->number = $request->number;
        $order->delivery_date = $request->delivery_date;
        $order->bank_method = $request->method;
        $order->payment_method = $request->method;
        $order->currency = $user->currency;

        $carts = Cart::where('session_token', '=', session('_token'))->get();
        $total = 0;
        foreach($carts as $cart){
            $total = $total + $cart->price * $cart->quantity ;
        }
        $order->price = $total;
        $order->tip = $request->tip;
        $order->promo_code = $request->promo_code;
        $order->additional_information = $request->additional_information;
        
        if($request->promo_code == $user->promo_code){
            $order->promo_percentage = $user->promo_percentage;
            // $order->price = $products->price / $user->promo_percentage;
        }
        $order->save();

         $token = Str::upper(Str::random(22));
         
         Session::put('_token', $token);
        if ($order->bank_method) {
            return redirect('/transaction/' . $order->id);
        }

    }
}
