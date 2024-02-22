<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\WrongAnswerModel;

class WrongAnswerService extends Controller
{
    public static function getUserWrongAnswers()
    {
        $authUser = auth()->user();
        $userWrongAnswers = WrongAnswerModel::where('user_id', $authUser->id)->get()->toArray();
        $wrongAnswers = [];
        foreach ($userWrongAnswers as $key => $row) {
            $wrongAnswers[$key] = [
                'question' => $row['full'],
                'answer' => $row['result'],
                'competition' => $row['competition'],
                'user_id' => $row['user_id'],
            ];
        }
        return $wrongAnswers;
    }

}
