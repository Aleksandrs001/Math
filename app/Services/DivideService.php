<?php

namespace App\Services;

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

    static public function getWinDivide()
    {
        $result['completed'] = false;
        $user = auth()->user();
        $divide = $user->mathDivide()->get();

        if (!empty($divide) && $divide[0]['divide_win'] >= Constants::DIVIDE_WIN) {
            $result['completed'] = true;
        } else if (!empty($divide[0]['divide_win']))  {
            $result['userLeft'] = Constants::DIVIDE_WIN - $divide[0]['divide_win'];
        } else {
            $result['userLeft'] = Constants::DIVIDE_WIN;
        }
        return $result;
    }

}
