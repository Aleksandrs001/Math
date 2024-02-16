<?php

namespace App\Http\Controllers;

class StatisticController extends Controller
{
    public function view()
    {
        $result = StatisticService::getTopOfUsersData();
        return view('topOfUser')->with(
            [
                'res' => $result,
            ]
        );
    }
}
