<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\ProfileController;
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
});

require __DIR__.'/auth.php';
//Route::put('/answer', 'IndexController@answer')->name('answer');

Route::get('/', [IndexController::class, 'index']);
//Route::match(['post', 'put'], '/answer', 'IndexController@answer')->name('answer');

//Route::put('/answer', [IndexController::class, 'answer'])->name('answer');
//Route::get('/refresh', [IndexController::class, 'refresh'])->name('refresh');
Route::get('/start', [IndexController::class, 'index'])->name('index');
Route::post('/start', [IndexController::class, 'answer'])->name('answer');


