<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Admin2SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['user_name' => 'superadmin'],
            [
                'name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@example.com',
                'phone_number' => '0700000000',
                'address' => 'Admin Panel',
                'role' => User::ROLE_SUPER_ADMIN,
                'password' => '123456', // cast hashed => hashed
                'created_by' => null,
            ]
        );
    }
}
