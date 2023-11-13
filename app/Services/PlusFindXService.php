<?php

namespace App\Services;

use App\Http\Controllers\Constants;

class PlusFindXService
{
    static public function plusFindXFunction()
    {
        $result = MathService::countOfExample(Constants::PLUS);
        foreach ($result as $key => $value) {
            $result[$key]['operation'] = Constants::PLUS;
            $result[$key]['result'] = $result[$key]['first'] + $result[$key]['second'];
        }

        return $result;
    }

}
