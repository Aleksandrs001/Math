<?php

namespace App\Http\Controllers;

use App\Models\UserAnswerStatistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController
{
    static function getUserName()
    {
        $user = auth()->user();
        if ($user) {
            return $user->name;
        } else {
            return '';
        }
    }

    public function getStatistic()
    {
        $user = auth()->user();
        if ($user) {
            $statistic = $user->userAnswerStatistic;
            return $statistic;
        } else {
            return '';
        }
    }
        public function answer(Request $request): JsonResponse
        {
            $answer = $request->input('answer');
            $result = $request->input('result');

            if (!is_numeric($answer) || floor($answer) != $answer) {
                return response()->json(['message' => 'Введите целое число.']);
            }
            try {
                $userAnswerStatistic = new UserAnswerStatistic();
                $userAnswerStatistic->user_id = $request->user()->id;

                if ($answer == $result) {
                    $userAnswerStatistic->increment('count');
                    $userAnswerStatistic->increment('win');
                    $userAnswerStatistic->save();
                    return response()->json(['message' => 'Ты молодец!']);
                } else  {
                    $userAnswerStatistic->increment('count');
                    $userAnswerStatistic->increment('loss');
                    return response()->json(['message' => 'Постарайся еще! Правильный ответ: ' . $result]);
                }

            } catch (\Exception $e) {
                Log::error('Error in answer method: ' . $e->getMessage());
                Log::error($e->getTraceAsString());

                return response()->json(['message' => 'Error'], 500);
            }
        }

}
