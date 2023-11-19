<?php

namespace App\Services;

use App\Models\UserAnswerStatistic;

class StatisticService
{
    public static function getTopOfUsersData()
    {
        return UserAnswerStatistic::getTopOfUsersData();
    }

    public static function getStatistic()
    {
       return UserAnswerStatistic::getStatistic();
    }



}
