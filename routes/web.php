<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/welcome', function () {
    return view('welcome');
});

/*
Route::get('/welcome', function () {
    return view('school.login');
});*/

//Interfaz del prefecto
Route::get('/prefect_interface', function () {
    return view('school.prefect_interface');
});
