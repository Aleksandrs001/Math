<?php

namespace App\Http\Controllers;

use App\Models\WrongAnswerModel;
use App\Services\WrongAnswerService;
use Illuminate\Support\Facades\Log;

class WrongAnswerController extends Controller
{
    private ?\Illuminate\Contracts\Auth\Authenticatable $user;

    public function wrongAnswers()
    {
        //i need result for auth user


        $this->user = $user = auth()->user();
        $temp = WrongAnswerModel::where('user_id', $this->user->id)->get()->toArray();
        Log::debug($user);
        return view('wrongAnswers')->with(
            [
                'wrongAnswers' => $temp,
                'res' => WrongAnswerService::getUserWrongAnswers(),
            ]
        );
    }

}
