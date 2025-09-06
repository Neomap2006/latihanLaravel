<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello world dari Laravel!";
});

Route::get('/nama', function () {
    return "Hello nama saya Neo!";
});