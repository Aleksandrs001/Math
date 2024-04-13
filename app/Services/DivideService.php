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

}
