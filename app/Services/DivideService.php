<?php

namespace App\Services;

use App\Http\Controllers\Constants;

class DivideService
{
    static public function divideFunction()
    {
        $result = MathService::countOfExample(Constants::DIVIDE);
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = Constants::DIVIDE;
            $result[$key]['result'] = $result[$key]['first'] / $result[$key]['second'];
        }

        return $result;

    }

}
