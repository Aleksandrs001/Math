<?php

namespace App\Http\Controllers;


use App\Services\PlusFindXService;

class PlusFindXController
{
    public function plusFindX()
    {
        $result = PlusFindXService::plusFindXFunction();
        return view('plusFindX')->with(
            [
            'res' => $result,
            ]
        );

    }
}
