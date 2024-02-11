<?php

use App\Http\Controllers\MinusController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//Route::middleware('auth:api')->get('/user', function(Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/minus', [MinusController::class, 'minus'])->name('minus');


//Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
//    return $request->user();
//});
//Route::post('/login', [UserController::class, 'login'])->name('login');
//Route::get('/minus', [MinusController::class, 'minus'])->name('minus');
//Route::post('test_data', [TestController::class, 'test_data'])->name('api.test_data');
////Route::get('/profile', function () {
////    // ...
////})->middleware('auth');
////Route::post('/profile', function () {
////    // ...
////})->middleware('auth');
//
//Route::get('/profile', function () {
//    // ...
//})->middleware(Authenticate::class);
//Route::get('/helloworld', [UserController::class, 'helloworld'])->name('helloworld');
//
//Route::get('/users', 'UserController@index');
//Route::post('/users', 'UserController@store');
//Route::get('/users/{id}', 'UserController@show');
