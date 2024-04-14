<?php

namespace App\Services;

use App\Http\Controllers\Constants;
use App\Http\Controllers\MultiplyController;

class MultiplyService
{
    static public function multiplyFunction(): array
    {
        $result = MathService::countOfExample(Constants::MULTIPLY);
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = Constants::MULTIPLY;
            $result[$key]['result'] = $result[$key]['first'] * $result[$key]['second'];
        }
        if ($result[0]['result'] > MultiplyController::MAX_SUM) {
            return MultiplyService::multiplyFunction();
        }
        return  $result;
    }

    public static function getWinMultiply()
    {
        $result['completed'] = false;
        $user = auth()->user();
        $multiply = $user->mathMultiply()->get();

        if (!empty($multiply[0]) && $multiply[0]['multiply_win'] >= Constants::MULTIPLY_WIN) {
            $result['completed'] = true;
        } else if (!empty($multiply[0]['multiply_win']))  {
            $result['userLeft'] = Constants::MULTIPLY_WIN - $multiply[0]['multiply_win'];
        } else {
            $result['userLeft'] = Constants::MULTIPLY_WIN;
        }
        return $result;
    }

}
