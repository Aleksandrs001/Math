<?php

namespace App\Services;

use App\Http\Controllers\Constants;

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
}
