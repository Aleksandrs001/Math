<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use App\Services\WeatherService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class StatisticController extends Controller
{
    public static function view(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = StatisticService::getTopOfUsersData();
        return view('topOfUser')->with(
            [
                'res' => $result,
            ]
        );
    }
}
