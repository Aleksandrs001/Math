<?php

namespace App\Http\Controllers;

use App\Services\DivideService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DivideController
{
    const MAX_SUM = 100 ;

    public function divide(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = DivideService::divideFunction();
        return view('divide')->with(
            [
                'res' => $result,
            ]
        );

    }

    public function long_divide(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = DivideService::long_divideFunction();
        return view('long_divide')->with(
            [
                'res' => $result,
            ]
        );

    }

}
