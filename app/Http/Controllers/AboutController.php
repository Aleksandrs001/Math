<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AboutController
{
    public function about(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        if (auth()->user()) {
            return view('about')->with(['user' => auth()->user()]);
        } else {
            return view('about');
        }
    }

}

