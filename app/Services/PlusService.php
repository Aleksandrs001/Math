<?php

namespace App\Services;

use App\Http\Controllers\Constants;

class PlusService
{
    static public function plusFunction()
    {
        $result = MathService::countOfExample(Constants::PLUS);
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = Constants::PLUS;
            $result[$key]['result'] = $result[$key]['first'] + $result[$key]['second'];
        }

        return $result;

    }

	public static function getWinPlus()
	{
        $result['completed'] = false;
        $user = auth()->user();
        $plus = $user->mathPlus()->get();

        if (!empty($plus[0]) && $plus[0]['plus_win'] >= Constants::PLUS_WIN) {
            $result['completed'] = true;
        } else if (!empty($plus[0]['plus_win']))  {
            $result['userLeft'] = Constants::PLUS_WIN - $plus[0]['plus_win'];
        } else {
            $result['userLeft'] = Constants::PLUS_WIN;
        }
        return $result;
	}

    public static function getWinPlusXFind()
    {
        $result['completed'] = false;
        $user = auth()->user();
        $plus = $user->plusXFind()->get();

        if (!empty($plus[0]) && $plus[0]['plus_win'] >= Constants::PLUS_X_WIN) {
            $result['completed'] = true;
        } else if (!empty($plus[0]['plus_win']))  {
            $result['userLeft'] = Constants::PLUS_X_WIN - $plus[0]['plus_win'];
        } else {
            $result['userLeft'] = Constants::PLUS_X_WIN;
        }
        return $result;
    }

}
