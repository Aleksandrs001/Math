<?php

namespace App\Services;

use App\Models\MathDivideModel;
use App\Models\MathLongDivideModel;
use App\Models\MathMinusModel;
use App\Models\MathMinusXModel;
use App\Models\MathMultiplyModel;
use App\Models\MathPlusModel;
use App\Models\MathPlusXModel;
use App\Models\UserAnswerStatisticModel;
use App\Models\WrongAnswerModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function answer($answer, $result, $competition, $user_id, $full): JsonResponse
    {
        if (!is_numeric($answer) || $competition != 'long_divide_without_reminder' && floor($answer) != $answer) {
            return response()->json(['message' => 'float.']);
        } else if ($competition == 'long_divide_without_reminder' && $answer != (int)$answer) {
            return response()->json(['message' => 'float']);
        }
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
                case 'long_divide_without_reminder':
                    $userAnswerStatistic = MathLongDivideModel::updateOrCreate(['user_id' => $user_id ]);
                    break;
                default:
                    return response()->json(['message' => 'Error'], 466);
            }
            $this->updateStatistics($userAnswerStatistic, $answer, $result, $competition, $user_id, $full);

            if ($competition != 'long_divide_without_reminder' && $answer == $result) {
                $message = 'ok';

            } else {
                $message = 'wrong';
            }
            if ($competition == 'long_divide_without_reminder') {
                if ((int)$answer == (int)$result) {
                    $message = 'ok';
                } else {
                    $message = 'wrong';
                }

            }
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
            'long divide without reminder' => ['long_divide_without_reminder']
        ];
        return $fields[$competition] ?? [];
    }

    private function updateStatistics($userAnswerStatistic, $answer, $result, $competition, $user_id, $full): void
    {
        $statisticsFields = $this->getStatisticsFields($competition);
        foreach ($statisticsFields as $field) {
            $this->updateStatisticField($userAnswerStatistic, $answer, $result, $field, $user_id, $full);
        }
    }

    private function updateStatisticField($userAnswerStatistic, $answer, $result, $field, $user_id, $full): void
    {
        $count = $field . '_count';
        $win = $field . '_win';
        $loss = $field . '_loss';
        $userAnswerStatistic->$count += 1;
        $updateStatistic = UserAnswerStatisticModel::updateOrCreate(['user_id' => $user_id ]);
        $updateStatistic->count += 1;

        if ($answer == $result) {
            $userAnswerStatistic->$win += 1;
            $updateStatistic->win += 1;
        } else {
            $userAnswerStatistic->$loss += 1;
            $updateStatistic->loss += 1;
            $as = WrongAnswerModel::create(['user_id' => $user_id, 'answer' => $answer]);
            $as->result = $answer;
            $as->competition = $field;
            $as->full = $full;
            $as->save();

        }
        $userAnswerStatistic->save();
        $updateStatistic->save();
    }

}
