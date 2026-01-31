<?php

namespace App\Http\Controllers;

use App\Services\MinusFindXService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class MinusFindXController
{
    public function minusFindX(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
		$result = MinusFindXService::minusFindXFunction();
		return view('minusFindX')->with(
			[
				'res'=> $result,
			]
		);
    }
}
