<?php

namespace App\Http\Controllers;


use App\Models\UserParam;

class LocaleController extends Controller
{
    public function changeLocale($locale)
    {
        session()->put('locale', $locale);
        if (auth()->check()) {
            $user = auth()->user();
            (new UserParam)->setParam('userLocale', $locale, $user->id);
        }
        return redirect()->back();
    }

}
