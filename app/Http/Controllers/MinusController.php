<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;


class MinusController
{
    const MAX_SUM = 100;
    public function minus(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        Log::debug((new UserController)->getStatistic());
        $res = $this->test();
        return view('minus')->with([
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

        $first = rand(1, $maxSum);
        $second = rand(1, $first - 1);  // Ensure $second is less than or equal to $first

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
