<?php

use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\PhoneOtp;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ============= User Routes ==============
Route::group(['prefix' => 'user'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('api.v1.user.login');
    Route::post('register', [AuthController::class, 'register'])->name('api.v1.user.register');

    Route::post('otp/phone/verify', [PhoneOtp::class, 'verifyPhoneOtp'])->name('api.v1.user.otp.phone.verify');
    Route::post('otp/phone/send', [PhoneOtp::class, 'sendPhoneOtp'])->name('api.v1.user.otp.phone.send');

    Route::namespace('App\Http\Controllers\Api\User')->middleware(['auth:user-api'])->name('user.')->group(function () {
        Route::resource('users', 'UserController');
        Route::post('get-nearest-deliveries', [UserController::class, 'getNearestDeliveries'])->name('get.nearest.deliveries');

        Route::get('profile', [ProfileController::class, 'getProfile'])->name('user.profile');
        Route::get('logout', [ProfileController::class, 'logout'])->name('user.logout');
    });
});
