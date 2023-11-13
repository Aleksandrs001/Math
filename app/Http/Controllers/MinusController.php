<?php

namespace App\Http\Controllers;

use App\Services\MinusService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class MinusController
{
    const MAX_SUM = 100;
    public function minus(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $result = MinusService::minusFunction();
        return view('minus')->with(
            [
            'res'=> $result,
            ]
        );
    }

}

