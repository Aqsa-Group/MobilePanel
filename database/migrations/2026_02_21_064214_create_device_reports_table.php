<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('device_reports', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Owner Information
            |--------------------------------------------------------------------------
            */
            $table->string('owner_full_name', 150);
            $table->string('owner_phone', 20)->index();
            $table->string('owner_national_id', 50)->nullable()->index();
            $table->string('owner_photo')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Device Information
            |--------------------------------------------------------------------------
            */
            $table->string('device_model', 150);
            $table->string('device_imei', 20)->unique();
            $table->string('device_image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Store Information
            |--------------------------------------------------------------------------
            */
            $table->string('store_name', 150)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Incident Information
            |--------------------------------------------------------------------------
            */
            $table->enum('incident_type', ['lost', 'stolen'])->index();
            $table->string('incident_location');
            $table->text('incident_description')->nullable();
            $table->dateTime('incident_date')->nullable();

            /*
            |--------------------------------------------------------------------------
            | System Status
            |--------------------------------------------------------------------------
            */
            $table->enum('status', [
                'pending',
                'verified',
                'rejected',
                'resolved'
            ])->default('pending')->index();

            $table->boolean('is_active')->default(true);
            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('admin_name')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Security Tracking
            |--------------------------------------------------------------------------
            */
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_reports');
    }
};
