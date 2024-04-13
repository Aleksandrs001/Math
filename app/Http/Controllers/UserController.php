<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    static public function getUserAvatar(): string
    {
        $userParams = auth()->user()->userParam()->get();
        if ($userParams->isEmpty()) {
            return false;
        } elseif ($userParams->where('param', 'avatar')->isEmpty()) {
            return false;
        } else {
            return $userParams->where('param', 'avatar')->first()->value;
        }

        return $user ? $user->email : '';
    }

    public function answer(Request $request): JsonResponse
    {
        if (!$request->ajax()) {
            return response()->json(['message' => 'Error'], 404);
        }

        if (!$request->has(['answer', 'result', 'competition'])) {
            return response()->json(['message' => 'Error'], 404);
        }
        $answer = $request->input('answer');
        $result = $request->input('result');
        $competition = $request->input('competition');
        $user_id = $request->user()->id;
        $full = $request->input('full');
        return (new UserService)->answer($answer, $result, $competition, $user_id, $full);
    }

    static public function FindUserById($id)
    {
        return User::find($id);
    }
}
