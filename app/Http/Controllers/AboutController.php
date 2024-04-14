<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\H;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AboutController
{
    public function about(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        if (H::user()) {
            return view('about')->with(['user' => H::user()]);
        } else {
            return view('about');
        }
    }

}

