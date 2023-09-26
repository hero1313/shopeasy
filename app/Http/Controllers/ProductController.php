<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Traits\SendSMSTrait;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    use SendSMSTrait;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Cookie::queue(Cookie::forget('welcome'));
        $products = Product::where('user_id', '=', Auth::user()->id)->get();
        return view('admin.components.products', compact(['products']));
    }
    public function store(Request $request)
    {
        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->first_price = $request->first_price;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->display = $request->display;
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file_resize = Image::make($file->getRealPath());
            $file_resize->fit(250);
            $file_resize->save('products-image/'. $filename);
            $product->image = "$filename";
            
        }
        $userProducts = Product::where('user_id', '=', Auth::user()->id)
        ->count();
        if($userProducts == 0){
            $product->save();
            return redirect()->back()->with('success', 'your message,here');
        }
        $product->save();

        return redirect()->back();
    
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->display = $request->display;
        
        if ($request->hasfile('image')) {
            $destination = 'products-image/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file_resize = Image::make($file->getRealPath());
            $file_resize->fit(250);
            $file_resize->save('products-image/'. $filename);
            $product->image = "$filename";
        }
        $product->update();

        return redirect('/admin/products');
    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $destination = 'products-image/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        $product->delete();

        return redirect('/admin/products');
    }

}
