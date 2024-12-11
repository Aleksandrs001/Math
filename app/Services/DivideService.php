<?php

namespace App\Services;

use App\Http\Controllers\Auth\H;
use App\Http\Controllers\Constants;

class DivideService
{
    static public function divideFunction(): array
    {
        $result = MathService::countOfExample(Constants::DIVIDE);
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = Constants::DIVIDE;
            $result[$key]['result'] = $result[$key]['first'] / $result[$key]['second'];
            if ($result[$key]['first'] == $result[$key]['second'] || $result[$key]['second'] == 1) {
               return DivideService::divideFunction();
            }
            if($result[$key]['result'] < 0) {
                return DivideService::divideFunction();
            }
        }

        return $result;
    }

    static public function getWinDivide(): array
    {
        $result['completed'] = false;
        $divide = H::user()->mathDivide()->get();

        if (!empty($divide[0]) && $divide[0]['divide_win'] >= Constants::DIVIDE_WIN) {
            $result['completed'] = true;
        } else if (!empty($divide[0]['divide_win']))  {
            $result['userLeft'] = Constants::DIVIDE_WIN - $divide[0]['divide_win'];
        } else {
            $result['userLeft'] = Constants::DIVIDE_WIN;
        }
        return $result;
    }

	public static function longDivideWithoutReminderFunction(): array
    {
        $result = MathService::countOfExample(Constants::LONG_DIVIDE_WIN);
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = Constants::DIVIDE;
            $result[$key]['result'] = $result[$key]['first'] / $result[$key]['second'];
            if ($result[$key]['first'] == $result[$key]['second'] || $result[$key]['second'] == 1) {
                return DivideService::longDivideWithoutReminderFunction();
            }
            if($result[$key]['result'] < 0) {
                return DivideService::longDivideWithoutReminderFunction();
            }
        }

        return $result;
	}

    static public function getWinLongDivideWithoutReminder(): array
    {
        $result['completed'] = false;
        $divide = H::user()->longDivideWithoutReminder()->get();

        if (!empty($divide[0]) && $divide[0]['long_divide_without_reminder_win'] >= Constants::LONG_DIVIDE_WIN) {
            $result['completed'] = true;
        } else if (!empty($divide[0]['long_divide_without_reminder_win']))  {
            $result['userLeft'] = Constants::LONG_DIVIDE_WIN - $divide[0]['long_divide_without_reminder_win'];
        } else {
            $result['userLeft'] = Constants::LONG_DIVIDE_WIN;
        }
        return $result;
    }

}
