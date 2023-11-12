<?php

namespace App\Services;

use App\Models\UserAnswerStatistic;

class StatisticService
{
    public function getStatistic()
    {
       return UserAnswerStatistic::getStatistic();
    }



}
