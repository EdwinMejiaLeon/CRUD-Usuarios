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
    //count
    Route::get('/conteoUsuarios', [App\Http\Controllers\countUsuariosController::class, 'index'])->name('countUsers');
});

//access level of admin
Route::group(['prefix' => '/userGeneral','middleware' => 'userGeneral', 'as' => 'userGeneral.'], function () {
    Route::resource('/userData', App\Http\Controllers\UserGeneralController::class)->names('userData');
    //survey
    Route::resource('/encuestaCovid', App\Http\Controllers\surveyUsuariosController::class)->names('surveyCovid');
});

//access level of supervisor
Route::group(['prefix' => '/supervisor','middleware' => 'admin', 'as' => 'supervisor.'], function () {
    Route::get('/listaUsuarios', [App\Http\Controllers\listUsuariosController::class, 'index'])->name('listUsers');
});