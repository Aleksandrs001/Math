<?php

namespace App\Services;

use App\Models\MathDivideModel;
use App\Models\MathMinusModel;
use App\Models\MathMinusXModel;
use App\Models\MathMultiplyModel;
use App\Models\MathPlusModel;
use App\Models\MathPlusXModel;
use App\Models\UserAnswerStatistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function answer($answer,$result, $competition, $user_id): JsonResponse
    {
        if (!is_numeric($answer) || floor($answer) != $answer) {
            return response()->json(['message' => 'Введите целое число.'], 422);
        }

        try {
            $userAnswerStatistic = UserAnswerStatistic::updateOrCreate(['user_id' => $user_id ]);
//            $userAnswerStatistic2 = MathDivideModel::updateOrCreate(['user_id' => $user_id ]);
//            $userAnswerStatistic3 = MathMinusModel::updateOrCreate(['user_id' => $user_id ]);
//            $userAnswerStatistic4 = MathMinusXModel::updateOrCreate(['user_id' => $user_id ]);
//            $userAnswerStatistic5 = MathMultiplyModel::updateOrCreate(['user_id' => $user_id ]);
//            $userAnswerStatistic6 = MathPlusModel::updateOrCreate(['user_id' => $user_id ]);
//            $userAnswerStatistic6 = MathPlusXModel::updateOrCreate(['user_id' => $user_id ]);

            $this->updateStatistics($userAnswerStatistic, $answer, $result, $competition);

            $message = $answer == $result;
            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            Log::error('Error in answer method: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['message' => 'Error'], 405);
        }
    }


    private function getStatisticsFields($competition): array
    {
        $fields = [
            'plusX' => ['plus_x'],
            'minusX' => ['minus_x'],
            'plus' => ['plus'],
            'minus' => ['minus'],
            'multiply' => ['multiply'],
            'divide' => ['divide'],
        ];

        return $fields[$competition] ?? [];
    }


    private function updateStatistics(UserAnswerStatistic $userAnswerStatistic, $answer, $result, $competition): void
    {
        $statisticsFields = $this->getStatisticsFields($competition);

        foreach ($statisticsFields as $field) {
            $this->updateStatisticField($userAnswerStatistic, $answer, $result, $field);
        }
    }

    private function updateStatisticField(UserAnswerStatistic $userAnswerStatistic, $answer, $result, $field): void
    {
        $count = $field . '_count';
        $win = $field . '_win';
        $loss = $field . '_loss';

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
