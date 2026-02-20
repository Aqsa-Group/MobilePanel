<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_list', function (Blueprint $table) {
            $table->id();

            // اطلاعات شخصی
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('image')->nullable();

            // احراز هویت
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // نقش و وضعیت
            $table->string('role')->default('user');
            $table->integer('user_count_added')->default(0);

            // ادمینی که کاربر را ساخته
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users_list')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void

    {
        Schema::dropIfExists('users_list');
    }
};
