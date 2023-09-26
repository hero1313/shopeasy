<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;



class CartController extends Controller
{
    public function show($company_name)
    {
        $products = Cart::where('session_token','=',session('_token'))->get();

        return response()->json([
            'products'=>$products,
        ]);
    }
    public function store(Request $request, $company_name, $id)
    {
        $prod =  Product::find($id);
        $product = new Cart;
        $product->session_token = session('_token');
        $product->shop_name = $company_name;
        $product->product_id = $id;
        $product->name = $prod->name;
        $product->price = $prod->price;
        $product->photo = $prod->image;
        $product->quantity = $request->quantity;

        $product->save();
    }
    
    public function update(Request $request, $id, $company_name)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->display = $request->display;

        $product->update();
    }

    public function delete(Request $request, $company_name, $id)
    {
        $product = Cart::find($id);
        
        if(session('_token') == $product->session_token){
            $product->delete();
        }
        else{
        }
    }

    public function plus(Request $request, $company_name, $id)
    {
        $product = Cart::find($id);
        
        if(session('_token') == $product->session_token){
            $product->amount ++;
            $product->update();
        }
        else{
        }
    }

    public function minus(Request $request, $company_name, $id)
    {
        $product = Cart::find($id);
        
        if(session('_token') == $product->session_token){
            $product->amount =$product->amount - 1;
            $product->update();
        }
        else{
        }
    }

}
