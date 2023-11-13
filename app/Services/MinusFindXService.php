<?php

namespace App\Services;

use App\Http\Controllers\Constants;

class MinusFindXService
{
    static public function minusFindXFunction(): array
    {
        $result = MathService::countOfExample(Constants::MINUS);
        foreach ($result as $key => $value)
        {
            $result[$key]['operation'] = Constants::MINUS;
            $result[$key]['result'] = $result[$key]['first'] - $result[$key]['second'];
        }

        return $result;

    }

}
