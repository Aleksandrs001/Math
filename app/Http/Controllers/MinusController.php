<?php

namespace App\Http\Controllers;

use App\Services\MathService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class MinusController
{
    const MAX_SUM = 100;
    public function minus(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $result = MathService::countOfExample();
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = '-';
            $result[$key]['equal'] = '=';
            $result[$key]['result'] = $result[$key]['first'] - $result[$key]['second'];
        }

        return view('minus')->with([
            'res'=> $result,
        ]);
    }

}

