<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
<<<<<<< HEAD

Route::get('/inventory', function () {
    return view('Mobile.shop.inventory'); 
});

Route::get('/inventory2', function () {
    return view('Mobile.shop.inventory2'); 
});

Route::get('/sell', function () {
    return view('Mobile.shop.sell'); 
});

Route::get('/salaryworkers', function () {
    return view('Mobile.shop.salaryworkers'); 
=======
=======
>>>>>>> origin/Marwa-K
//Login
Route::get('/login', function () {
    return view('Mobile.Auth.login');
});
//Dashboard
Route::get('/dasboard', function () {
    return view('Mobile.shop.dashboard');
});

//Customer
Route::get('/customer', function () {
    return view('Mobile.shop.customer');
});
// customerInformation
Route::get('/customer-Information', function () {
    return view('Mobile.shop.customerInformation');
});
// deviceForm
Route::get('/device-Form', function () {
    return view('Mobile.shop.deviceForm');
});
// customerInformation
Route::get('/device-Information', function () {
    return view('Mobile.shop.deviceInformation');
});
// userForm
Route::get('/user-form', function () {
    return view('Mobile.shop.userform');
});
// customerInformation
Route::get('/user-Information', function () {
    return view('Mobile.shop.userInformation');
});

// borrowings
Route::get('/borrowings-page', function () {
    return view('Mobile.shop.borrowings-page');
});
// accounts-page
Route::get('/accounts', function () {
    return view('Mobile.shop.accounts-page');
<<<<<<< HEAD
>>>>>>> 35f639f42dfbb415133f110a21e2e895a9349a44
=======
>>>>>>> origin/Marwa-K
});