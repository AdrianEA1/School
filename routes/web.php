<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PrefectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/welcome', function () {
    return view('welcome');
});

//Interfaz del prefecto #n
Route::get('/prefect_interface/{user_id}', [PrefectController::class, 'index'])->name('prefect_interface');

//Interfaz del prefecto
Route::get('/group_details', function () {
    return view('school.groups_interface');
})->name('group_details');
