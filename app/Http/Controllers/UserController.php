<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use App\Services\UserService;
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
            if (!$request->ajax()){
                return response()->json(['message' => 'Error'], 404);
            }

            if ( !$request->has(['answer','result','competition'])) {
                return response()->json(['message' => 'Error'], 404);
            }

            $answer = $request->input('answer');
            $result = $request->input('result');
            $competition = $request->input('competition');
            $user_id = $request->user()->id;
            $full = $request->input('full');
            return (new UserService)->answer($answer,$result,$competition,$user_id, $full);
        }

    public function topOfUser()
    {
        StatisticService::getTopOfUsersData();
    }

}
