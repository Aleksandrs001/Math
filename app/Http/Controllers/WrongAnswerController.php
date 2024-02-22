<?php

namespace App\Http\Controllers;

use App\Services\WrongAnswerService;
use Illuminate\Support\Facades\Log;

class WrongAnswerController extends Controller
{
    public function wrongAnswers()
    {
        return view('wrongAnswers')->with(
            [
                'res' => WrongAnswerService::getUserWrongAnswers(),
            ]
        );
    }

}
