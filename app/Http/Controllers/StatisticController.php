<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use Illuminate\Support\Facades\Log;

class StatisticController extends Controller
{
    public static function view()
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
