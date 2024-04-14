<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\H;
use App\Models\WrongAnswerModel;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class WrongAnswerController extends Controller
{

    public function wrongAnswers(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $wrongAnswers = WrongAnswerModel::where('user_id', H::user()->id)->get()->toArray();
        return view('wrongAnswers')->with(
            [
                'wrongAnswers' => $wrongAnswers,
            ]
        );
    }

}
