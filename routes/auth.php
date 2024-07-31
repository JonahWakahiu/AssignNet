<?php
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/register', 'manageRegister')->name('register.manage');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(EmailVerificationController::class)->middleware('auth')->name('verification.')->group(function () {
    Route::get('email/verify', 'notice')->name('notice');
    Route::get('email/verify/{hash}/{id}', 'verify')->name('verify');
    Route::post('email/verification-controller', 'send')->name('send');
});

Route::controller(SocialiteController::class)->middleware('guest')->name('socialite.')->group(function () {
    Route::get('auth/{provider}/redirect', 'redirect')->name('redirect');
    Route::get('auth/{provider}/callback', 'callback')->name('callback');
});


Route::controller(ForgotPasswordController::class)->middleware('guest')->name('password.')->group(function () {
    Route::get('forgot-password', 'forgotPassword')->name('')->name('request');
    Route::post('forgot-password', 'manageForgotPassword')->name('')->name('email');
});

Route::controller(ResetPasswordController::class)->middleware('guest')->name('password.')->group(function () {
    Route::get('reset-password/{token}', 'resetPassword')->name('reset');
    Route::post('reset-password', 'manageResetPassword')->name('update');
});
