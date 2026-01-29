<?php

require __DIR__.'/vendor/autoload.php';

$app = require __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\UserForm;
use Illuminate\Support\Facades\Hash;

UserForm::updateOrCreate(
    ['username' => 'admin'],
    [
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'rule' => 'admin',
        'password' => Hash::make('12345678'),
        'address' => 'کابل',
        'number' => '0700000000'
    ]
);
echo " Admin | username: admin | password: 12345678";
