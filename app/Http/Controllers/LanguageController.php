<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function set(string $locale)
    {
        Session::put('lang.locale', $locale);

        return back();
    }
}
