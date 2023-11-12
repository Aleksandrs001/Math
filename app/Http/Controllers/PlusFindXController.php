<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlusFindXController
{
    const MAX_SUM = 100;
    public function plusFindX()
    {
        $res = $this->test();
        return view('plusFindX')->with([
            'res' => $res,
        ]);
    }

    function test(): array
    {
        for ($i = 0; $i < 1; $i++) {
            $res[$i] = $this->generate();
        }

        return $res;
    }

    public function generate(): array
    {
        $maxSum = self::MAX_SUM;

        // Generate $first in the range [1, $maxSum - 1]
        $first = rand(1, $maxSum - 1);

        // Generate $second in the range [1, $maxSum - $first]
        $second = rand(1, $maxSum - $first);

        $result = $first + $second;

        return [
            'first' => $first,
            'operation' => '+',
            'second' => $second,
            'equal' => '=',
            'result' => $result,
            'userName' => UserController::getUserName(),
        ];
    }

}
