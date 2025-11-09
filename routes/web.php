<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Login
Route::get('/login', function () {
    return view('Mobile.Auth.login');
});
//Dashboard
Route::get('/dasboard', function () {
    return view('Mobile.shop.dashboard');
});