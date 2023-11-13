<?php

namespace App\Http\Controllers;

use App\Services\MinusFindXService;

class MinusFindXController
{
    public function minusFindX()
    {
            $result = MinusFindXService::minusFindXFunction();
            return view('minusFindX')->with(
                [
                'res'=> $result,
                ]
            );
    }
}
