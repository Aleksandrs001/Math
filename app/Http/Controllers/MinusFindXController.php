<?php

namespace App\Http\Controllers;

use App\Services\MathService;

class MinusFindXController
{
    public function minusFindX()
    {
            $result = MathService::countOfExample();
            foreach ($result as $key => $value)
            {
                $result[$key]['operation'] = Constants::MINUS;
                $result[$key]['result'] = $result[$key]['first'] - $result[$key]['second'];
            }

            return view('minusFindX')->with([
                'res'=> $result,
            ]);
    }
}
