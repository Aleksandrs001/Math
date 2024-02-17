<?php

namespace App\Services;

use App\Models\UserAnswerStatisticModel;
use Illuminate\Support\Facades\Log;

class StatisticService
{
    public static function getTopOfUsersData()
    {
        $topUsers = UserAnswerStatisticModel::getAllUsersStatistic();
//        Log::debug(print_r($topUsers, true));
        return $topUsers;
    }

    public static function getStatistic()
    {
       return UserAnswerStatisticModel::getStatistic();
    }

}
