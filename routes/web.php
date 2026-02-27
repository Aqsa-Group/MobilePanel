<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Mobile\UserForm2;
use App\Livewire\Mobile\Profile;
use App\Livewire\Mobile\Welcome;
use App\Livewire\Mobile\Support;
use App\Livewire\Mobile\Customer;
use App\Livewire\Mobile\DeviceRepair;
use App\Livewire\Mobile\UserEdit;
use App\Http\Controllers\Auth\LoginController;
use App\Livewire\Mobile\CustomerEdit;
use App\Livewire\Mobile\Cushfund;
use App\Http\Controllers\CustomerController;
use App\Livewire\Mobile\Employe;
use App\Livewire\Mobile\Sell;
use App\Livewire\Mobile\SellForm;
use App\Livewire\Mobile\Register;
use App\Livewire\Mobile\StoreOnboarding;
use App\Http\Controllers\AuthController;
use App\Models\AppNotification;
use App\Models\RegisterDevice as RegisterDeviceModel;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::middleware('auth')->group(function () {
Route::post('/logout', function () { Auth::logout(); request()->session()->invalidate();  request()->session()->regenerateToken(); return redirect()->route('welcome');})->name('logout');
Route::get('/store-onboarding', StoreOnboarding::class)->name('store.onboarding');

Route::middleware('store.registered')->group(function () {
Route::get('/', Welcome::class)->name('welcome');
Route::get('/userList', function () {return view('Mobile.shop.userList');})->name('user.list');
Route::get('/cashfund', function () {return view('Mobile.shop.cashfund');})->name('cashfund');
Route::get('/employe', function () { return view('Mobile.shop.employe'); })->name('employe');
Route::get('/customers', function () { return view('Mobile.shop.customers');})->name('customers');
Route::get('/customer/{id?}', function($id = null) { return view('Mobile.shop.customer', ['id' => $id]);})->name('customer');
Route::get('/customer/{id}/pdf', [CustomerController::class, 'generatePDF'])->name('customer.pdf');
Route::get('/reports', function () { return view('Mobile.shop.reports');})->name('reports');
Route::get('/inventory', function () { return view('Mobile.shop.inventory');})->name('inventory');
Route::get('/inventory2', function () { return view('Mobile.shop.inventory2');})->name('inventory2');
Route::get('/sell', function () { return view('Mobile.shop.sell');})->name('sell');
Route::get('/register', function () {
    $user = auth()->user();
    $editId = (int) request()->query('edit_register_id', 0);

    if (!$user) {
        abort(403);
    }

    if ($editId > 0) {
        $canEditBlocked = RegisterDeviceModel::query()
            ->where('id', $editId)
            ->where('submitted_by_user_id', $user->id)
            ->where('status', 'blocked')
            ->exists();

        if (!$canEditBlocked) {
            abort(403);
        }

        return view('Mobile.shop.register');
    }

    if (!$user->isStoreAdmin()) {
        abort(403);
    }

    return view('Mobile.shop.register');
})->name('register');
Route::get('/register-list', function () { return view('Mobile.shop.register-list');})->name('seller.register.list');
Route::get('/seller/notifications/unread', function () {
    $userId = (int) auth()->id();
    if ($userId <= 0) {
        abort(403);
    }

    $unreadCount = AppNotification::forSeller($userId)
        ->where('is_read', false)
        ->count();

    return response()->json([
        'unreadCount' => $unreadCount,
    ]);
})->name('seller.notifications.unread');
Route::get('/sellform', function () { return view('Mobile.shop.sellform');})->name('sellform');
Route::get('/salaryworkers', function () { return view('Mobile.shop.salaryworkers');})->name('salaryworkers');
Route::get('/device-Form', function () { return view('Mobile.shop.deviceForm');})->name('device.form');
Route::get('/borrowings-page', function () { return view('Mobile.shop.borrowings-page');})->name('borrowings');
Route::get('/device-repair', function () { return view('Mobile.shop.device-repair');})->name('device.repair');
Route::get('/accounts-page', function () { return view('Mobile.shop.accounts-page');})->name('accounts');
Route::get('/profile', function () { return view('Mobile.shop.profile');})->name('profile');
});
});
use App\Livewire\Admin2\Dashboard;
use App\Livewire\Admin2\Users;
use App\Livewire\Admin2\DeviceList;
use App\Livewire\Admin2\RegisterDevice;
use App\Livewire\Admin2\Store;
use App\Http\Controllers\AuthControllers;
use App\Livewire\Admin2\Reports;
use App\Livewire\Admin2\Profile as AdminProfile;
use App\Livewire\Admin2\Support as AdminSupport;
Route::prefix('admin2')->group(function () {
    Route::get('/login', [AuthControllers::class, 'showLogin'])->name('admin2.login');
    Route::post('/login', [AuthControllers::class, 'login'])->name('admin2.login.post');
    Route::post('/logout', [AuthControllers::class, 'logout'])->name('admin2.logout');
    Route::middleware('auth:admin2')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin2.dashboard');
    Route::get('/users', Users::class)->name('admin2.users');
    Route::get('/device-list', DeviceList::class)->name('admin2.device-list');
    Route::get('/register-device', RegisterDevice::class)->name('admin2.register-device');
    Route::get('/store', Store::class)->name('admin2.store');
    Route::get('/profile', AdminProfile::class)->name('admin2.profile');
    Route::get('/reports', Reports::class)->name('admin2.reports');
    });
});
use App\Livewire\Website\Home;
use App\Livewire\Website\About;
use App\Livewire\Website\Contact;
use App\Livewire\Website\Register as WebsiteRegister;
use App\Livewire\Website\MyReports as WebsiteMyReports;
use App\Livewire\Website\Services;
use App\Http\Controllers\WebsiteAuthController;
Route::prefix('website')->group(function () {
    Route::middleware('website.auth')->group(function () {
        Route::get('/', Home::class)->name('website.home');
        Route::get('/about', About::class)->name('website.about');
        Route::get('/services', Services::class)->name('website.services');
        Route::get('/contact', Contact::class)->name('website.contact');
        Route::get('/register', WebsiteRegister::class)->name('website.register');
        Route::get('/my-reports', WebsiteMyReports::class)->name('website.my-reports');
        Route::post('/logout', [WebsiteAuthController::class, 'logout'])->name('website.logout');
    });

    Route::get('/login', [WebsiteAuthController::class, 'showLogin'])->name('website.login');
    Route::post('/login', [WebsiteAuthController::class, 'login'])->name('website.login.post');
    Route::get('/signup', [WebsiteAuthController::class, 'showSignup'])->name('website.signup');
    Route::post('/signup', [WebsiteAuthController::class, 'signup'])->name('website.signup.post');
});
