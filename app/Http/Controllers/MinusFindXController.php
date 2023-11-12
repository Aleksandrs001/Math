<?php

namespace App\Http\Controllers;

class MinusFindXController
{
    const MAX_SUM = 100;
    public function minusFindX()
    {
        $res = $this->test();
        return view('minusFindX')->with([
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

        $first = rand(1, $maxSum);
        $second = rand(1, $first - 1);

        $result = $first - $second;

        return [
            'first' => $first,
            'operation' => '-',
            'second' => $second,
            'equal' => '=',
            'result' => $result,
            'userName' => UserController::getUserName(),
        ];
    }

}
