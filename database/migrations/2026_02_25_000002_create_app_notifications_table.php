<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('target_guard');
            $table->unsignedBigInteger('target_user_id')->nullable();
            $table->string('scope')->default('single');
            $table->string('type')->nullable();
            $table->string('title');
            $table->text('message');
            $table->json('payload')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index(['target_guard', 'target_user_id', 'is_read']);
            $table->index(['target_guard', 'scope', 'is_read']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app_notifications');
    }
};

