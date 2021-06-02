<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//access level of admin
Route::group(['prefix' => '/admin','middleware' => 'admin', 'as' => 'admin.'], function () {
    //users
    Route::resource('/users', App\Http\Controllers\UserController::class)->names('users');
    Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'active'])->name('active');
});

//access level of admin
Route::group(['prefix' => '/userGeneral','middleware' => 'userGeneral', 'as' => 'userGeneral.'], function () {
    Route::resource('/userData', App\Http\Controllers\UserGeneralController::class)->names('userData');
});