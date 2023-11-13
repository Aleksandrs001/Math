<?php

namespace App\Http\Controllers;

use App\Services\MultiplyService;

class MultiplyController
{
    const MAX_SUM = 100;

    public function multiply()
    {
        $result = MultiplyService::multiplyFunction();

        return view('multiply')->with(
            [
                'res' => $result,
            ]
        );
    }

}
