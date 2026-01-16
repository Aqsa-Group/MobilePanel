<?php
// Seller Panel
use Illuminate\Support\Facades\Route;
use App\Livewire\Mobile\UserForm2;
use App\Livewire\Mobile\DeviceForm2;
use App\Livewire\Mobile\Profile;
use App\Livewire\Mobile\Welcome;
use App\Livewire\Mobile\Support;
use App\Livewire\Mobile\DeviceRepair;
use App\Livewire\Mobile\UserEdit;
use App\Http\Controllers\Auth\LoginController;
use App\Livewire\Mobile\CustomerEdit;
use App\Livewire\Mobile\Employe;
use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::middleware('auth')->group(function () {
    Route::get('/', Welcome::class)->name('welcome');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/userList', function () {return view('Mobile.shop.userList');})->name('user.list');
    Route::get('/user-edit/{id}', UserEdit::class) ->name('user.edit');
    Route::get('/user-form', function () { return view('Mobile.shop.userform');})->name('user.form');
    Route::get('/employe', function () { return view('Mobile.shop.employe'); })->name('employe');
    Route::get('/employe-edit/{id}', function($id) { return view('mobile.shop.employe-edit', compact('id'));})->name('employe.edit');
    Route::get('/customers', function () { return view('Mobile.shop.customers');})->name('customers');
    Route::get('/customer', function () { return view('Mobile.shop.customer');})->name('customer');
    Route::get('/customer-edit/{id}', CustomerEdit::class)  ->name('customer.edit');
    Route::get('/reports', function () { return view('Mobile.shop.reports');})->name('reports');
    Route::get('/inventory', function () { return view('Mobile.shop.inventory');})->name('inventory');
    Route::get('/inventory2', function () { return view('Mobile.shop.inventory2');})->name('inventory2');
    Route::get('/sell', function () { return view('Mobile.shop.sell');})->name('sell');
    Route::get('/salaryworkers', function () { return view('Mobile.shop.salaryworkers');})->name('salaryworkers');
    Route::get('/device-Form', function () { return view('Mobile.shop.deviceForm');})->name('device.form');
    Route::get('/device-form2', DeviceForm2::class) ->name('device.form2');
    Route::get('/device-Information', function () {  return view('Mobile.shop.deviceInformation');})->name('device.form3');
    Route::get('/borrowings-page', function () { return view('Mobile.shop.borrowings-page');})->name('borrowings');
    Route::get('/device-repair', function () { return view('Mobile.shop.device-repair');})->name('device.repair');
    Route::get('/accounts-page', function () { return view('Mobile.shop.accounts-page');})->name('accounts');
});
// management Panel
use App\Livewire\Admin2\Dashboard;
use App\Livewire\Admin2\Users;
use App\Livewire\Admin2\DeviceList;
use App\Livewire\Admin2\RegisterDevice;
use App\Livewire\Admin2\Store;
use App\Livewire\Admin2\Reports;
use App\Livewire\Admin2\Profile as AdminProfile;
use App\Livewire\Admin2\Support as AdminSupport;
// login page
Route::get('/admin2/login', function () {
    return view('livewire.admin2.pages.login');
})->name('admin2.login');
// profile
Route::get('/admin2/profile', function () {
    return view('livewire.admin2.pages.profile');
})->name('admin2.profile');
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
// website
use App\Livewire\Website\Home;
use App\Livewire\Website\About;
use App\Livewire\Website\Contact;
use App\Livewire\Website\Register;
use App\Livewire\Website\Services;
Route::prefix('website')
    ->name('website.')
    ->group(function () {
        Route::get('/', Home::class)->name('home');
        Route::get('/about', About::class)->name('about');
        Route::get('/register', Register::class)->name('register');
        Route::get('/services', Services::class)->name('services');
        Route::get('/contact', Contact::class)->name('contact');
Route::get('/login', function () {
    return view('livewire.website.login');
})->name('login');
    });
