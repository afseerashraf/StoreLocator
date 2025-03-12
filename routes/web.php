<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(UserController::class)->prefix('user')->name('user.')->group(function(){
    Route::view('register', 'user.register')->name('viewRegister');
    Route::post('registred', 'register')->name('register');
    Route::view('login', 'user.login')->name('viewLogin');
    Route::post('logined', 'login')->name('login');
});


Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::view('register', 'admin.register')->name('viewRegister');
    Route::post('registered', 'register')->name('register');
    Route::view('login', 'admin.login')->name('viewLogin');
    Route::post('login', 'login')->name('login');
    Route::get('logout/{id}', 'logout')->name('logout');
});

Route::resource('store', StoreController::class);
