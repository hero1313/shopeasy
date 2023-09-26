<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Traits\SendSMSTrait;


class MainController extends Controller
{
    use SendSMSTrait;

    public function index(Request $request, $company_name)
    {
        $company = User::where('shop_name', '=', $company_name)->first();
        if(!$company){
            abort(404, 'Page not found');
        }
        if($company->language){
            Session::put("locale",$company->language);
            App::setLocale(Session::get("locale"));
        }
        $today = Carbon::today();
        $day_2 = Carbon::tomorrow();
        $day_3 = Carbon::today()->addDays(2);
        $day_4 = Carbon::today()->addDays(3);
        $day_5 = Carbon::today()->addDays(4);
        $day_6 = Carbon::today()->addDays(5);
        $day_7 = Carbon::today()->addDays(6);
        if ($company != null) {
            $products = Product::where('user_id', '=', $company->id)->where('display', '=', 1)->get();
            return view('main.components.main', compact(['products', 'company', 'today', 'day_2', 'day_3', 'day_4', 'day_5', 'day_6', 'day_7']));
        } else {
            abort(404);
        }
    }
    public function redirectShopAdmin()
    {
        $shopName = Auth::user()->shop_name;
        return Redirect::to('https://' . $shopName . '.shopeasy.ge/admin/products');
    }
    public function captcha()
    {
        return captcha_img();
    }


    public function termsCondition($company_name)
    {
        $company = User::where('shop_name', '=', $company_name)->first();

        if ($company != null) {
            return view('main.components.terms-condition', compact(['company']));
        } else {
            abort(404);
        }
    }

    public function confidencePolicy($company_name)
    {
        $company = User::where('shop_name', '=', $company_name)->first();

        if ($company != null) {
            return view('main.components.confidence-policy', compact(['company']));
        } else {
            abort(404);
        }
    }

    public function termsDelivery($company_name)
    {
        $company = User::where('shop_name', '=', $company_name)->first();

        if ($company != null) {
            return view('main.components.terms-delivery', compact(['company']));
        } else {
            abort(404);
        }
    }

    public function returnPolicy($company_name)
    {
        $company = User::where('shop_name', '=', $company_name)->first();

        if ($company != null) {
            return view('main.components.return-policy', compact(['company']));
        } else {
            abort(404);
        }
    }
}
