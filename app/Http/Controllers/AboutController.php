<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AboutController
{
    public function about(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        return view('about');
    }

}

