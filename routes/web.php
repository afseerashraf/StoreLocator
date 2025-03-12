<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StoreController;
use Stevebauman\Location\Facades\Location;

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
    Route::get('profile', 'profile')->name('profile');
    Route::get('logout/{id}', 'logout')->name('logout');
});

Route::resource('store', StoreController::class);

Route::get('location', function(){
    $position = Location::get('192.168.1.1');
    echo $position->countryName;
});