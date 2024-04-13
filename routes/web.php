<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DivideController;
use App\Http\Controllers\LessonsWithoutRegister;
use App\Http\Controllers\MinusFindXController;
use App\Http\Controllers\MultiplyController;
use App\Http\Controllers\PlusController;
use App\Http\Controllers\MinusController;
use App\Http\Controllers\PlusFindXController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WrongAnswerController;
use App\Services\AvatarService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;


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

//withoutRegistration

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('welcome')->with([
            'res'=> (new LessonsWithoutRegister)->index()
        ]);
    }
});

Route::post('/withoutRegistration', [LessonsWithoutRegister::class, 'withoutRegistration'])->name('withoutRegistration');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/change-locale/{locale}', [LocaleController::class, 'changeLocale'])->name('change.locale');




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

    Route::get('/multiply', [MultiplyController::class, 'multiply'])->name('multiply');
    Route::post('/multiply', [UserController::class, 'answer'])->name('answer');

    Route::get('/divide', [DivideController::class, 'divide'])->name('divide');
    Route::post('/divide', [UserController::class, 'answer'])->name('answer');

    Route::get('/topOfUser', [StatisticController::class, 'view'])->name('view');

    Route::get('/wrongAnswers', [WrongAnswerController::class, 'wrongAnswers'])->name('wrongAnswers');

    Route::post('/avatar', [AvatarService::class, 'save'])->name('avatar.save');

});


require __DIR__.'/auth.php';


