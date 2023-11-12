<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function changeLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
