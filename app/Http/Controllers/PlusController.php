<?php

namespace App\Http\Controllers;

use App\Services\PlusService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlusController extends Controller
{
    const MAX_SUM = 100;

    function plus(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $result = PlusService::plusFunction();
        return view('plus')->with(
            [
            'res' => $result,
            ]
        );
    }

}
