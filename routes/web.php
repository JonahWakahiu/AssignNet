<?php

use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::view('/', 'home')->name('home');

    Route::controller(OrderController::class)->name('order.')->group(function () {
        Route::get('/order/step-one', 'orderStepOne')->name('step-one');
        Route::post('/order/step-one', 'handleOrderStepOne')->name('step-one.handle');
        Route::get('/order/step-two', 'orderStepTwo')->name('step-two');
        Route::post('/order/step-two', 'handleOrderStepTwo')->name('step-two.handle');
        Route::post('/order/step-two-existing-user', 'handleOrderStepTwoExistingUser')->name('step-two-existing-user.handle');
    });
});


Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::controller(ProfileController::class)->name('profile.')->group(function () {
        Route::get('profile', 'profile')->name('index');
        Route::post('profile', 'manageProfile')->name('profile');
        Route::post('password', 'managePassword')->name('password');
    });


});
