<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;

class StatisticController extends Controller
{
    public static function view(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Log::debug('here');
        $result = StatisticService::getTopOfUsersData();
        return view('topOfUser')->with(
            [
                'res' => $result,
            ]
        );
    }
}
