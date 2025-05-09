<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\adminAuth;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::view('', 'user.register')->name('viewRegister');

    Route::post('registred', 'register')->name('register');

    Route::view('login', 'user.login')->name('viewLogin');

    Route::post('logined', 'login')->name('login');

    Route::get('logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::view('', 'admin.register')->name('viewRegister');

    Route::post('registered', 'register')->name('register');

    Route::view('login', 'admin.login')->name('viewLogin');

    Route::post('logined', 'login')->name('login');

    Route::get('profile', 'profile')->name('profile')->middleware(adminAuth::class);

    Route::get('logout/{id}', 'logout')->name('logout');
});

Route::resource('store', StoreController::class)->middleware(adminAuth::class);
