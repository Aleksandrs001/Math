<?php

namespace App\Http\Controllers;

use App\Services\MultiplyService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;

class MultiplyController
{
    const MAX_SUM = 100;

    public function multiply(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = MultiplyService::multiplyFunction();

        return view('multiply')->with(
            [
                'res' => $result,
            ]
        );
    }

}
