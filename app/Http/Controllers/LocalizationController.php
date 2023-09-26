<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class LocalizationController extends Controller
{
    public function setLang($locale){
        App::setLocale($locale);
        Session::put("locale", $locale);
        return redirect()->back();
    }
}
