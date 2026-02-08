<?php

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\UserForm;
use Illuminate\Support\Facades\Hash;

// اول فقط رکورد را بگیر یا بساز (بدون INSERT)
$user = UserForm::firstOrNew([
    'username' => 'admin',
]);

// بعد تمام فیلدهای اجباری را پر کن
$user->forceFill([
    'first_name' => 'Admin',
    'last_name'  => 'System',
    'name'       => 'Admin System',
    'email'      => 'admin@example.com',
    'rule'       => 'admin',
    'password'   => Hash::make('12345678'),
    'address'    => 'کابل',
    'number'     => '0700000000',
]);

$user->save();

echo "Admin created/updated ✅ | username: admin | password: 12345678\n";
