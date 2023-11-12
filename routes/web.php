<?php

use App\Http\Controllers\MinusFindXController;
use App\Http\Controllers\PlusController;
use App\Http\Controllers\MinusController;
use App\Http\Controllers\PlusFindXController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/plus', [PlusController::class, 'plus'])->name('plus');
    Route::post('/plus', [UserController::class, 'answer'])->name('answer');

    Route::get('/minus', [MinusController::class, 'minus'])->name('minus');
    Route::post('/minus', [UserController::class, 'answer'])->name('answer');

    Route::get('/plusFindX', [PlusFindXController::class, 'plusFindX'])->name('plusFindX');
    Route::post('/plusFindX', [UserController::class, 'answer'])->name('answer');

    Route::get('/minusFindX', [MinusFindXController::class, 'minusFindX'])->name('minusFindX');
    Route::post('/minusFindX', [UserController::class, 'answer'])->name('answer');

});

require __DIR__.'/auth.php';


