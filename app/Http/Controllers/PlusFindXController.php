<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlusFindXController
{
    const MAX_SUM = 100;
    public function plusFindX()
    {
        $res = $this->test();
        return view('plusFindX')->with([
            'res' => $res,
        ]);
    }

    function test(): array
    {
        for ($i = 0; $i < 1; $i++) {
            $res[$i] = $this->generate();
        }

        return $res;
    }

    public function answer(Request $request): JsonResponse
    {
        info('Request data: ' . json_encode($request->all()));
        $answer = $request->input('answer');
        $result = $request->input('result');

        // Validate if the answer is an integer
        if (!is_numeric($answer) || floor($answer) != $answer) {
            return response()->json(['message' => 'Введите целое число.']);
        }

        try {
            if ($answer == $result) {
                return response()->json(['message' => 'Ты молодец!']);
            } else {
                return response()->json(['message' => 'Постарайся еще! Правильный ответ: ' . $result]);
            }
        } catch (\Exception $e) {
            Log::error('Error in answer method: ' . $e->getMessage());
            return response()->json(['message' => 'Error'], 500);
        }
    }


    public function generate(): array
    {
        $maxSum = self::MAX_SUM;

        // Generate $first in the range [1, $maxSum - 1]
        $first = rand(1, $maxSum - 1);

        // Generate $second in the range [1, $maxSum - $first]
        $second = rand(1, $maxSum - $first);

        $result = $first + $second;

        return [
            'first' => $first,
            'operation' => '+',
            'second' => $second,
            'equal' => '=',
            'result' => $result,
            'userName' => $this->getUserName(),
        ];
    }

    public function getUserName()
    {
        $user = auth()->user();
        if ($user) {
            return $user->name;
        } else {
            return '';
        }
    }

}
