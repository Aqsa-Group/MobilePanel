<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', function () {
    return view('Mobile.Auth.login');
});

// Dashboard
Route::get('/dasboard', function () {
    return view('Mobile.shop.dashboard');
});

// Customers
Route::get('/customers', function () {
    return view('Mobile.shop.customers');
});

// User List
Route::get('/userList', function () {
    return view('Mobile.shop.userList');
});

// Reports
Route::get('/reports', function () {
    return view('Mobile.shop.reports');
});
