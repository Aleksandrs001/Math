<?php
namespace App\Http\Controllers;

use App\Services\DivideService;
use App\Services\MinusFindXService;
use App\Services\MinusService;
use App\Services\MultiplyService;
use App\Services\PlusFindXService;
use App\Services\PlusService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LessonsWithoutRegister
{
    public function index(): array
    {
        $random = rand(1, 6);
        switch ($random) {
            case 1:
                $result = PlusService::plusFunction();
                break;
            case 2:
                $result = MinusService::minusFunction();
                break;
            case 3:
                $result = MultiplyService::multiplyFunction();
                break;
            case 4:
                $result = DivideService::divideFunction();
                break;
            case 5:
                $result = PlusFindXService::plusFindXFunction();
                break;
            case 6:
                $result = MinusFindXService::minusFindXFunction();
                break;
        }

        return $result ;
    }

    public function show($id)
    {
        return view('lesson', ['id' => $id]);
    }

    public function withoutRegistration(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json(['message' => 'Error'], 404);
        }
        $count = 0;
        if ($request->has('answer')) {
            if (Session::get('_token') === $request->input('_token')) {
                $count = Session::get('count', 0);
                $count++;
                Session::put('count', $count);
            }
        }

        if ($count == 10) {
            Session::forget('count');
            return response()->json(['message' => 'count']);
        }

        if (!is_numeric($request->input('answer'))) {
            return response()->json(['message' => 'nan']);
        }
        $message = $request->input('answer') == $request->input('result');
        if ($message) $message = 'ok';
        return response()->json(['message' => $message]);
    }

}
