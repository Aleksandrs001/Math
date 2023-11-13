<?php

namespace App\Http\Controllers;

use App\Services\DivideService;

class DivideController
{
    const MAX_SUM = 100 ;

    public function divide()
    {
        $result = DivideService::divideFunction();

        return view('divide')->with(
            [
                'res' => $result,
            ]
        );

    }

}
