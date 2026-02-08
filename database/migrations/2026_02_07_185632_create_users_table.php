<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
       Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable()->index();
        $table->string('name');
        $table->string('username')->index();
        $table->string('email')->index();
        $table->string('rule');
        $table->string('limit')->nullable();
        $table->string('password');
        $table->string('address');
        $table->string('number');
        $table->string('image')->nullable();
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->unsignedBigInteger('creator_id')->nullable();
        $table->unsignedBigInteger('admin_id')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
