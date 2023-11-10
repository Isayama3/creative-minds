<?php

use App\Http\Controllers\Web\User\AuthController;
use App\Http\Controllers\Web\User\HomeController;
use App\Http\Controllers\Web\User\UserController;
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

// ============= User Routes ==============
Route::group(['prefix' => 'user'], function () {
    Route::get('login', [AuthController::class,'loginView'])->name('login.form');
    Route::post('login', [AuthController::class,'loginPost'])->name('login.post');

    Route::namespace('App\Http\Controllers\Web\User')->middleware(['auth:user'])->name('user.')->group(function () {
        Route::get('logout', [AuthController::class,'logout'])->name('login.logout');
        Route::get('home', [HomeController::class,'index'])->name('home');
        Route::resource('users', 'UserController');
        Route::post('send-firebase-message/{device_key}', [UserController::class,'sendFirebaseMsg'])->name('firebase.msg');
    });
});
