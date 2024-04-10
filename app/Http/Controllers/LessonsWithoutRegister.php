<?php
namespace App\Http\Controllers;

use App\Services\MinusFindXService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class LessonsWithoutRegister
{

    public function index()
    {
        return  MinusFindXService::minusFindXFunction();
//        return view('lessons');
    }

    public function show($id)
    {
        return view('lesson', ['id' => $id]);
    }

    public function withoutRegistration(Request $request) {

        if (!$request->ajax()) {
            return response()->json(['message' => 'Error'], 404);
        }
        Log::debug($request->all());

        if (!is_numeric($request->input('answer')) || floor($request->input('answer')) != $request->input('result')) {
//            return response()->json(['message' => 'Введите целое число.'], 422);
            return response()->json(['message' => $request->input('answer')]);

        }
        return response()->json(['message' => 'ok']);
    }

}
