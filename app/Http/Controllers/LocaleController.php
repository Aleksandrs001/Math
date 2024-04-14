<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Auth\H;
use App\Models\UserParam;

class LocaleController extends Controller
{
    public function changeLocale($locale)
    {
        session()->put('locale', $locale);
        if (auth()->check()) {
            (new UserParam)->setParam('userLocale', $locale, H::user()->id);
        }
        return redirect()->back();
    }

}
