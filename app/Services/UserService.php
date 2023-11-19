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
//            $userAnswerStatistic = UserAnswerStatistic::updateOrCreate(['user_id' => $user_id ]);

        try {
            switch ($competition) {
                case 'plusX':
                    $userAnswerStatistic = MathPlusXModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                case 'minusX':
                    $userAnswerStatistic = MathMinusXModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                case 'plus':
                    $userAnswerStatistic = MathPlusModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                case 'minus':
                    $userAnswerStatistic = MathMinusModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                case 'multiply':
                    $userAnswerStatistic = MathMultiplyModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                case 'divide':
                    $userAnswerStatistic = MathDivideModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                default:
                    return response()->json(['message' => 'Error'], 404);
            }
////            $userAnswerStatistic2 = MathDivideModel::updateOrCreate(['user_id' => $user_id ]);
////            $userAnswerStatistic3 = MathMinusModel::updateOrCreate(['user_id' => $user_id ]);
////            $userAnswerStatistic4 = MathMinusXModel::updateOrCreate(['user_id' => $user_id ]);
////            $userAnswerStatistic5 = MathMultiplyModel::updateOrCreate(['user_id' => $user_id ]);
////            $userAnswerStatistic6 = MathPlusModel::updateOrCreate(['user_id' => $user_id ]);
////            $userAnswerStatistic6 = MathPlusXModel::updateOrCreate(['user_id' => $user_id ]);

            $this->updateStatistics($userAnswerStatistic, $answer, $result, $competition, $user_id);

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


    private function updateStatistics($userAnswerStatistic, $answer, $result, $competition, $user_id): void
    {
        $statisticsFields = $this->getStatisticsFields($competition);

        foreach ($statisticsFields as $field) {
            $this->updateStatisticField($userAnswerStatistic, $answer, $result, $field, $user_id);
        }
    }

    private function updateStatisticField($userAnswerStatistic, $answer, $result, $field, $user_id): void
    {
        $count = $field . '_count';
        $win = $field . '_win';
        $loss = $field . '_loss';
        $userAnswerStatistic->$count += 1;
        $updateStatistic = UserAnswerStatistic::updateOrCreate(['user_id' => $user_id ]);
        $updateStatistic->count += 1;

        if ($answer == $result) {
            $userAnswerStatistic->$win += 1;
            $updateStatistic->win += 1;
        } else {
            $userAnswerStatistic->$loss += 1;
            $updateStatistic->loss += 1;
        }

        $userAnswerStatistic->save();
        $updateStatistic->save();
    }


}
