<?php

namespace App\Services;

use App\Http\Controllers\Constants;
use Illuminate\Support\Facades\Log;

class MinusService
{
     static public function minusFunction(): array
     {
         $result = MathService::countOfExample(Constants::MINUS);
         foreach ($result as $key => $value)
         {
             $result[$key]['operation'] = Constants::MINUS;
             $result[$key]['result'] = $result[$key]['first'] - $result[$key]['second'];
         }
         return $result;
     }

	public static function getWinMinus()
	{
        $result['completed'] = false;
        $user = auth()->user();
        $minus = $user->mathMinus()->get();

        if (!empty($minus[0]) && $minus[0]['minus_win'] >= Constants::MINUS_WIN) {
            $result['completed'] = true;
        } else if (!empty($minus[0]['minus_win']))  {
            $result['userLeft'] = Constants::MINUS_WIN - $minus[0]['minus_win'];
        } else {
            $result['userLeft'] = Constants::MINUS_WIN;
        }
        return $result;
	}

    public static function getWinMinusXFind()
    {
        $result['completed'] = false;
        $user = auth()->user();
        $minus = $user->minusXFind()->get();
        if (!empty($minus[0]) && $minus[0]['minus_win'] >= Constants::MINUS_X_WIN) {
            $result['completed'] = true;
        } else if (!empty($minus[0]['minus_win']))  {
            $result['userLeft'] = Constants::MINUS_X_WIN - $minus[0]['minus_win'];
        } else {
            $result['userLeft'] = Constants::MINUS_X_WIN;
        }
        return $result;
    }
}
