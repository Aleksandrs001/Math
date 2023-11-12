<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlusController
{
    const MAX_SUM = 100;

    function plus(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $res = $this->test();
        return view('plus')->with([
            'res'=> $res,
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
