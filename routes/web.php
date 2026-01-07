<?php

// Seller Panel
use Illuminate\Support\Facades\Route;
use App\Livewire\Mobile\UserForm2;
use App\Livewire\Mobile\DeviceForm2;
use App\Livewire\Mobile\Welcome;
use App\Livewire\Mobile\Support;
use App\Livewire\Mobile\DeviceRepair;
use App\Http\Controllers\Auth\LoginController;

// management Panel
use App\Livewire\Admin2\Dashboard;
use App\Livewire\Admin2\Users;
use App\Livewire\Admin2\DeviceList;
use App\Livewire\Admin2\RegisterDevice;
use App\Livewire\Admin2\Store;
use App\Livewire\Admin2\Reports;
use App\Livewire\Admin2\Support as AdminSupport;

// ********************************************************
// Seller Panel ***********************************

// dashboard
Route::get('/', Welcome::class)->name('welcome');

// Login
// فرم لاگین
Route::get('/login', function () {
    return view('Mobile.Auth.login');
})->name('login');


// User List
Route::get('/userList', function () {
    return view('Mobile.shop.userList');
})->name('user.list');

// userForm1
Route::get('/user-form', function () {
    return view('Mobile.shop.userform');
})->name('user.form');

// userForm2
Route::get('/user-Information2', function () {
    return view('Mobile.shop.userInformation2');
});

// userForm3
Route::get('/user-Information', function () {
    return view('Mobile.shop.userInformation');
});

// Customer list
Route::get('/customers', function () {
    return view('Mobile.shop.customers');
})->name('customers');

//Customer form1
Route::get('/customer', function () {
    return view('Mobile.shop.customer');
})->name('customer');

// customer form2
Route::get('/customer-Information', function () {
    return view('Mobile.shop.customerInformation');
});

// Reports
Route::get('/reports', function () {
    return view('Mobile.shop.reports');
})->name('reports');

//Inventory
Route::get('/inventory', function () {
    return view('Mobile.shop.inventory');
})->name('inventory');

//Inventory2
Route::get('/inventory2', function () {
    return view('Mobile.shop.inventory2');
})->name('inventory2');

//Sell
Route::get('/sell', function () {
    return view('Mobile.shop.sell');
})->name('sell');

//SalaryWorkers
Route::get('/salaryworkers', function () {
    return view('Mobile.shop.salaryworkers');
})->name('salaryworkers');

// deviceForm1
Route::get('/device-Form', function () {
    return view('Mobile.shop.deviceForm');
})->name('device.form');

// deviceForm2
Route::get('/device-form2', DeviceForm2::class)
    ->name('device.form2');

//deviceForm3
Route::get('/device-Information', function () {
    return view('Mobile.shop.deviceInformation');
})->name('device.form3');

// borrowings
Route::get('/borrowings-page', function () {
    return view('Mobile.shop.borrowings-page');
})->name('borrowings');

// Repair
Route::get('/device-repair', function () {
    return view('Mobile.shop.device-repair');
})->name('device.repair');

Route::get('/accounts-page', function () {
    return view('Mobile.shop.accounts-page');
})->name('accounts');

// suppprt
Route::get('/support', Support::class)->name('support');

// ******************************************************
// management Panel ***********************************

// login page
Route::get('/admin2/login', function () {
    return view('livewire.admin2.pages.login');
})->name('admin2.login');

// Dashboard
Route::prefix('admin2')->group(function () {
    Route::get('/dashboard', Dashboard::class)
        ->name('admin2.dashboard');
});

// Users
Route::prefix('admin2')->group(function () {
    Route::get('/users', Users::class)
        ->name('admin2.users');
});

// device-list
Route::prefix('admin2')->group(function () {
    Route::get('/device-list', DeviceList::class)
        ->name('admin2.device-list');
});

// device-register
Route::prefix('admin2')->group(function () {
    Route::get('/register-device', RegisterDevice::class)
        ->name('admin2.register-device');
});

// store
Route::prefix('admin2')->group(function () {
    Route::get('/store', Store::class)
        ->name('admin2.store');
});

// Reports
Route::prefix('admin2')->group(function () {
    Route::get('/reports', Reports::class)
        ->name('admin2.reports');
});

// support
Route::get('/admin2/support', AdminSupport::class)
    ->name('admin2.support');

use App\Livewire\Website\Home;
use App\Livewire\Website\About;
use App\Livewire\Website\Contact;

Route::prefix('website')
    ->name('website.')
    ->group(function () {

        Route::get('/', Home::class)->name('home');
        // Route::get('/about', About::class)->name('about');
        // Route::get('/contact', Contact::class)->name('contact');

    });
