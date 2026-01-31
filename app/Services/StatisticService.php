<?php

namespace App\Services;

use App\Http\Controllers\Auth\H;
use App\Http\Controllers\UserController;
use App\Models\UserAnswerStatisticModel;

class StatisticService
{
    public static function getTopOfUsersData(): array
    {
        $topUsers = UserAnswerStatisticModel::getAllUsersStatistic()->toArray();
        $authUser = H::user();

        if (empty($topUsers)) {
            return [];
        }

        $count = [];

        foreach ($topUsers as $key => $row) {
            $count[$key] = [
                'win' => $row['win'],
                'loss' => $row['loss'],
                'count' => $row['count'],
                'user_id' => $row['user_id'],
            ];
        }

        foreach ($count as $key => $row) {
            if ($row['loss'] == 0) {
                $count[$key]['ratio'] = $row['win'];
            } else {
                $count[$key]['ratio'] = round($row['win'] / $row['loss'], 3);
            }
        }

        usort($count, function ($a, $b) {
            $ratioComparison = $b['ratio'] <=> $a['ratio'];
            return ($ratioComparison === 0) ? ($b['count'] <=> $a['count']) : $ratioComparison;
        });

        $sorted = [];
        foreach ($count as $row) {
            $sorted[$row['user_id']] = [
                'count' => $row['count'],
                'ratio' => $row['ratio'],
                'loss' => $row['loss'],
                'user_id' => $row['user_id'],
            ];
            if ($row['user_id'] == $authUser->id) {
                $sorted[$row['user_id']]['thisUser'] = 'true';
            }
        }
        foreach ($sorted as $key => $value) {
            $sorted[$key]['user_name'] = UserController::FindUserById($key)->name ?? 'User without name';
            if (isset(UserController::FindUserById($key)->email)) {
                $sorted[$key]['user_email'] = StatisticService::hideEmail(UserController::FindUserById($key)->email);
            } else {
                //TODO: if user was deleted maybe we should hide result
//                $sorted[$key]['user_email'] = 'deleted used';
                unset($sorted[$key]);
            }
        }
        $notSorted = $sorted;
        $sorted = array_slice($sorted, 0, 10);
        $sortedUserIds = array_column($sorted, 'user_id');

        foreach ($notSorted as $key => $value) {
            if (!in_array( $authUser->id, $sortedUserIds)) {
                $userStatistic = UserAnswerStatisticModel::getStatistic();
                $thisUserCount = $userStatistic->count ?? 0;
                $thisUserWin = $userStatistic->win ?? 0;
                $thisUserLoss = $userStatistic->loss ?? 0;
                if($thisUserCount > 0 && $userStatistic->loss == 0){
                    $sorted[$key] = [
                        'count' => $thisUserCount,
                        'ratio' => $thisUserWin,
                        'loss' => $thisUserLoss,
                        'user_id' => $authUser->id,
                        'user_name' => UserController::getUserName(),
                        'user_email' => StatisticService::hideEmail($authUser->email),
                        'thisUser' => 'true',

                    ];
                } else {
                    $sorted[$key] = [
                        'count' => $thisUserCount,
                        'ratio' => ($thisUserLoss != 0) ? round($thisUserWin / $thisUserLoss, 3) : 0,
                        'loss' => $thisUserLoss,
                        'user_id' => $authUser->id,
                        'user_name' => UserController::getUserName(),
                        'user_email' => StatisticService::hideEmail($authUser->email),
                        'thisUser' => 'true',
                    ];
                }
                break;
            }
        }
        //add user avatar to the array
        foreach ($sorted as $key => $value) {
            $avatar = UserController::getUserAvatar($value['user_id']);
            if ($avatar) {
                $sorted[$key]['user_avatar'] = $avatar;
            } else {
                $sorted[$key]['user_avatar'] = 'user.png';
            }
        }
        return $sorted;
    }

        static function hideEmail($email): string
        {
        $emailParts = explode('@', $email);

        if (strlen($emailParts[0]) <= 4) {
            $maskedEmail = substr_replace($emailParts[0], '***', 1, 2) . '@' . $emailParts[1];
        } else {
            $firstPart = substr($emailParts[0], 0, 2); // First character
            $hiddenPart = str_repeat('*', min(strlen($emailParts[0]) - 4, 3)); // Show no more than three asterisks
            $lastCharacter = substr($emailParts[0], -1); // Last character before '@'
            $maskedEmail = $firstPart . $hiddenPart . $lastCharacter . '@' . $emailParts[1];
        }

       return $maskedEmail;
    }

    public static function getStatistic(): array
    {
       return UserAnswerStatisticModel::getStatistic();
    }

}
