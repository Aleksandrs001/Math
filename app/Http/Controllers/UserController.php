<?php

namespace App\Http\Controllers;

use App\Models\UserAnswerStatistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function answer(Request $request): JsonResponse
    {
        $answer = $request->input('answer');
        $result = $request->input('result');

        if (!is_numeric($answer) || floor($answer) != $answer) {
            return response()->json(['message' => 'Введите целое число.'], 422);
        }

        try {
            $userAnswerStatistic = UserAnswerStatistic::updateOrCreate(
                ['user_id' => $request->user()->id],
            );
            $this->updateStatistics($request, $userAnswerStatistic, $answer, $result);
            if ($answer == $result) {
                return response()->json(['message' => true]);
            } else {
                return response()->json(['message' => false]);
            }
        } catch (\Exception $e) {
            Log::error('Error in answer method: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['message' => 'Error'], 500);
        }
    }

    private function updateStatistics(Request $request, UserAnswerStatistic $userAnswerStatistic, $answer, $result): void
    {
        $competition = $request->input('competition');
        switch ($competition) {
            case 'plusX':
                $count = 'plus_x_count';
                $win = 'plus_x_win';
                $loss = 'plus_x_loss';
                $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $count, $win, $loss);
                break;
            case 'minusX':
                $count = 'minus_x_count';
                $win = 'minus_x_win';
                $loss = 'minus_x_loss';
                $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $count, $win, $loss);
                break;
            case 'plus':
                $count = 'plus_count';
                $win = 'plus_win';
                $loss = 'plus_loss';
                $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $count, $win, $loss);
                break;
            case 'minus':
                $count = 'minus_count';
                $win = 'minus_win';
                $loss = 'minus_loss';
                $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $count, $win, $loss);
                break;
            case 'multiply':
                $count = 'multiply_count';
                $win = 'multiply_win';
                $loss = 'multiply_loss';
                $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $count, $win, $loss);
                break;
            case 'divide':
                $count = 'divide_count';
                $win = 'divide_win';
                $loss = 'divide_loss';
                $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $count, $win, $loss);
                break;
            default:
                break;
        }
    }

    private function updateStatisticsInDB(UserAnswerStatistic $userAnswerStatistic, $answer, $result, $count, $win, $loss): void
    {
        $userAnswerStatistic->$count += 1;
        $userAnswerStatistic->count += 1;
        if ($answer == $result) {
            $userAnswerStatistic->$win += 1;
            $userAnswerStatistic->win += 1;
        } else {
            $userAnswerStatistic->$loss += 1;
            $userAnswerStatistic->loss += 1;
        }
        $userAnswerStatistic->save();
    }
}
