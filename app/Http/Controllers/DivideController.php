<?php

namespace App\Http\Controllers;

use App\Services\DivideService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DivideController
{
    const MAX_SUM = 100 ;

    public function divide(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = DivideService::divideFunction();
        return view('divide')->with(
            [
                'res' => $result,
            ]
        );

    }

    public function longDivideWithoutReminder(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = DivideService::longDivideWithoutReminderFunction();
        return view('long_divide_without_reminder')->with(
            [
                'res' => $result,
            ]
        );

    }

}
