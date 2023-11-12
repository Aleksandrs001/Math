<?php

namespace App\Http\Controllers;

use App\Services\MathService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlusController extends Controller
{

    function plus(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $result = MathService::countOfExample();
        foreach ($result as $key => $value) {
            $result[$key]['operation'] = Constants::PLUS;
            $result[$key]['result'] = $result[$key]['first'] + $result[$key]['second'];
        }

        return view('plus')->with([
            'res' => $result,
        ]);
    }

}
