<?php

use App\Http\Controllers\Position\PositionController;
use App\Http\Controllers\WorkingTimeUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkingTimeController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('userWorkingTime', [WorkingTimeUserController::class, 'showProfileWorkingTime'])->name('workingTimeUser.showProfileWorkingTime');
    Route::group(['middleware' => 'can:isBoss'], function() {
        Route::get('Position', [PositionController::class, 'index'])->name('position.index');
        Route::get('addPosition', [PositionController::class, 'store'])->name('position.store');
        Route::post('addPosition', [PositionController::class, 'create'])->name('position.store');
        Route::get('editPosition/{position}', [PositionController::class, 'edit'])->name('position.edit');
        Route::post('editPosition/{position}', [PositionController::class, 'update'])->name('position.edit');
        Route::delete('deletePosition/{position}', [PositionController::class, 'delete']);
        Route::delete('deleteTimeWorkingUser/{id}', [WorkingTimeUserController::class, 'delete']);
        Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
        Route::get('/createUser', [RegisterController::class, 'index'])->name('user.create');
        Route::post('/createUser', [RegisterController::class, 'store'])->name('user.store');
    });

    Route::group(['middleware' => 'can:isBossOrMngr'], function() {
        Route::get('timeUsers', [WorkingTimeController::class, 'index'])->name('workingTime.index');
        Route::post('timeUsers', [WorkingTimeController::class, 'selectIndex'])->name('workingTime.index');
        Route::get('showTimeWorkingUser/{user}', [WorkingTimeUserController::class, 'show'])->name('workingTimeUser.show');
        Route::get('editTimeWorkingUser/{workingTime}', [WorkingTimeUserController::class, 'edit'])->name('workingTimeUser.edit');
        Route::post('editTimeWorkingUser/{workingTime}', [WorkingTimeUserController::class, 'update'])->name('workingTimeUser.edit');
        Route::get('users/rcp', [WorkingTimeController::class, 'create']);
        Route::get('users/month', [TimeController::class, 'index']);
        Route::post('/users/montho', [TimeController::class, 'showTime']);
        Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/users/edit/{user}', [UserController::class, 'editview']);
        Route::post('/users/edit/{id}', [UserController::class, 'update']);
        Route::post('users', [WorkingTimeController::class, 'store']);
    });

});
