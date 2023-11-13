<?php

namespace App\Http\Controllers;


use App\Services\PlusFindXService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PlusFindXController
{
    public function plusFindX(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = PlusFindXService::plusFindXFunction();
        return view('plusFindX')->with(
            [
            'res' => $result,
            ]
        );

    }
}
