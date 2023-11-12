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
            return response()->json(['message' => 'Введите целое число.'], 422);
        }

        try {
            $userAnswerStatistic = UserAnswerStatistic::updateOrCreate(
                ['user_id' => $request->user()->id],
                [
                    'user_id' => $request->user()->id,
                    'count' => DB::raw('count + 1'),
                    'win' => DB::raw($answer == $result ? 'win + 1' : 'win'),
                    'loss' => DB::raw($answer == $result ? 'loss' : 'loss + 1'),
                ]
            );

            $this->updateStatistics($request, $userAnswerStatistic, $answer, $result);
            if ($answer == $result) {
                return response()->json(['message' => 'Ты молодец!']);
            } else {
                return response()->json(['message' => 'Неправильно!']);
            }
        } catch (\Exception $e) {
            Log::error('Error in answer method: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return response()->json(['message' => 'Error'], 500);
        }
    }

    private function updateStatistics(Request $request, UserAnswerStatistic $userAnswerStatistic, $answer, $result)
    {
        $competition = $request->input('competition');

        switch ($competition) {
            case 'plusX':
                $this->updatePlusXStatistics($userAnswerStatistic, $answer, $result);
                break;
            case 'minusX':
                $this->updateMinusXStatistics($userAnswerStatistic, $answer, $result);
                break;
            case 'plus':
                $this->updatePlusStatistics($userAnswerStatistic, $answer, $result);
                break;
            case 'minus':
                $this->updateMinusStatistics($userAnswerStatistic, $answer, $result);
                break;
            default:
                break;
        }
    }

    private function updatePlusXStatistics(UserAnswerStatistic $userAnswerStatistic, $answer, $result)
    {
        $userAnswerStatistic->plus_x_count += 1;

        if ($answer == $result) {
            $userAnswerStatistic->plus_x_win += 1;
        } else {
            $userAnswerStatistic->plus_x_loss += 1;
        }

        $userAnswerStatistic->save();
    }

    private function updateMinusXStatistics(UserAnswerStatistic $userAnswerStatistic, $answer, $result)
    {
        $userAnswerStatistic->minus_x_count += 1;

        if ($answer == $result) {
            $userAnswerStatistic->minus_x_win += 1;
        } else {
            $userAnswerStatistic->minus_x_loss += 1;
        }

        $userAnswerStatistic->save();
    }

    private function updatePlusStatistics(UserAnswerStatistic $userAnswerStatistic, $answer, $result)
    {
        $userAnswerStatistic->plus_count += 1;

        if ($answer == $result) {
            $userAnswerStatistic->plus_win += 1;
        } else {
            $userAnswerStatistic->plus_loss += 1;
        }

        $userAnswerStatistic->save();
    }

    private function updateMinusStatistics(UserAnswerStatistic $userAnswerStatistic, $answer, $result)
    {
        $userAnswerStatistic->minus_count += 1;

        if ($answer == $result) {
            $userAnswerStatistic->minus_win += 1;
        } else {
            $userAnswerStatistic->minus_loss += 1;
        }

        $userAnswerStatistic->save();
    }


}
