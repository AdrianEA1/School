<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Interfaz del prefecto
Route::get('/prefect_interface', function () {
    return view('school.prefect_interface');
});
