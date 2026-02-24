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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();

            // Customer Info
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_tazkira_id')->nullable();
            $table->text('customer_address')->nullable();
            $table->string('customer_image')->nullable();
            $table->string('tazkira_image')->nullable();

            // Device Info
            $table->string('category');
            $table->string('model');
            $table->string('color')->nullable();
            $table->string('carton_image')->nullable();
            $table->string('device_image')->nullable();
            $table->string('imei')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
