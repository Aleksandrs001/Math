<?php

namespace App\Services;

use App\Http\Controllers\MinusController;
use App\Http\Controllers\UserController;

class MathService
{
   static function countOfExample(): array
    {
        for ($i = 0; $i < 1; $i++) {
            $res[$i] = MathService::generate();
        }
        return $res;
    }

    static function generate():array
    {
        $maxSum = MinusController::MAX_SUM;

        $first = rand(1, $maxSum);
        $second = rand(1, $first - 1);
        return [
            'first' => $first,
            'second' => $second,
            'equal' => '=',
            'userName' => UserController::getUserName(),
        ];
    }
}
