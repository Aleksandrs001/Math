<?php

namespace App\Http\Controllers;


class LocaleController extends Controller
{
    public function changeLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
