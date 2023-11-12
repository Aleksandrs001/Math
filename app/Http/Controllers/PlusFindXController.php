<?php

namespace App\Http\Controllers;


use App\Services\MathService;

class PlusFindXController
{
    public function plusFindX()
    {
        $result = MathService::countOfExample();
        foreach ($result as $key => $value) {
            $result[$key]['operation'] = '+';
            $result[$key]['equal'] = '=';
            $result[$key]['result'] = $result[$key]['first'] + $result[$key]['second'];
        }

        return view('plusFindX')->with([
            'res' => $result,
        ]);

    }
}
