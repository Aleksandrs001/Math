<?php

namespace App\Http\Controllers;

use App\Models\UserAnswerStatistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController
{
    static public function getUserName(): string
    {
        $user = auth()->user();
        return $user ? $user->name : '';
    }

    public function answer(Request $request): JsonResponse
    {
        $answer = $request->input('answer');
        $result = $request->input('result');

        if (!is_numeric($answer) || floor($answer) != $answer) {
            return response()->json(['message' => 'Введите целое число.'], 422);
        }

        try {
            $userAnswerStatistic = UserAnswerStatistic::updateOrCreate(['user_id' => $request->user()->id]);
            $this->updateStatistics($request, $userAnswerStatistic, $answer, $result);

            $message = ($answer == $result) ? true : false;
            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            Log::error('Error in answer method: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['message' => 'Error'], 500);
        }
    }

    private function updateStatistics(Request $request, UserAnswerStatistic $userAnswerStatistic, $answer, $result): void
    {
        $competition = $request->input('competition');
        $statisticsFields = $this->getStatisticsFields($competition);
        $this->updateStatisticsInDB($userAnswerStatistic, $answer, $result, $statisticsFields);
    }

    private function getStatisticsFields($competition): array
    {
        $fields = [
            'plusX' => ['plus_x_count', 'plus_x_win', 'plus_x_loss'],
            'minusX' => ['minus_x_count', 'minus_x_win', 'minus_x_loss'],
            'plus' => ['plus_count', 'plus_win', 'plus_loss'],
            'minus' => ['minus_count', 'minus_win', 'minus_loss'],
            'multiply' => ['multiply_count', 'multiply_win', 'multiply_loss'],
            'divide' => ['divide_count', 'divide_win', 'divide_loss'],
        ];

        return $fields[$competition] ?? [];
    }

    private function updateStatisticsInDB(UserAnswerStatistic $userAnswerStatistic, $answer, $result, $fields): void
    {
        if (empty($fields)) {
            return;
        }

        [$count, $win, $loss] = $fields;

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
