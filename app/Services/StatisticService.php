<?php

namespace App\Services;

use App\Models\UserAnswerStatisticModel;

class StatisticService
{
    public static function getTopOfUsersData()
    {
        return UserAnswerStatisticModel::getTopOfUsersData();
    }

    public static function getStatistic()
    {
       return UserAnswerStatisticModel::getStatistic();
    }



}
