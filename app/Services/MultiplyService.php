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

}
