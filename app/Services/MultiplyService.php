<?php

namespace App\Services;

use App\Http\Controllers\Constants;

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

        return  $result;



    }

}
