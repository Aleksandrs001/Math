<?php

namespace App\Services;

use App\Http\Controllers\Constants;
use App\Http\Controllers\DivideController;
use App\Http\Controllers\MinusController;
use App\Http\Controllers\MultiplyController;
use App\Http\Controllers\PlusController;
use App\Http\Controllers\UserController;
class MathService
{
    static function countOfExample($operation): array
    {
        for ($i = 0; $i < 1; $i++) {
            $res[$i] = MathService::generate($operation);
        }
        return $res;
    }

    public static function generate($operation): array {
        $maxSum = 100;

        switch ($operation) {
            case Constants::PLUS:
                $maxSum = PlusController::MAX_SUM;
                break;
            case Constants::MINUS:
                $maxSum = MinusController::MAX_SUM;
                break;
            case Constants::MULTIPLY:
                $maxSum = MultiplyController::MAX_SUM;
                break;
            case Constants::DIVIDE:
                $maxSum = DivideController::MAX_SUM;
                break;
        }

        $first = rand(1, $maxSum);

        $second = ($operation == Constants::MINUS) ? rand(1, $first) : rand(1, $maxSum);

        if ($operation == Constants::DIVIDE) {
            $divisors = array_filter(range(1, $first), function ($divisor) use ($first) {
                return $first % $divisor == 0;
            });
            $second = $divisors[array_rand($divisors)];
        } else {
            $first =  rand(1, 10);
            $second =  rand(1, 10);
        }

        return [
            'first' => $first,
            'second' => $second,
            'equal' => Constants::EQUAL,
            'userName' => UserController::getUserName(),
        ];
    }
}
