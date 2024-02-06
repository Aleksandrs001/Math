<?php

namespace App\Services;

use App\Http\Controllers\Constants;
use App\Models\StatisticModel;
use Illuminate\Support\Facades\Log;

class MinusService
{
     static public function minusFunction(): array
     {

         $tmp = (new StatisticModel)->belongsToUser();
         Log::debug(print_r($tmp));
         $result = MathService::countOfExample(Constants::MINUS);
         foreach ($result as $key => $value)
         {
             $result[$key]['operation'] = Constants::MINUS;
             $result[$key]['result'] = $result[$key]['first'] - $result[$key]['second'];
         }

         return $result;

     }
}
