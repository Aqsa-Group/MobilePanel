<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('device_repair_forms')) {
            Schema::create('device_repair_forms', function (Blueprint $table) {
                $table->id();
                $table->string('category');
                $table->string('name');
                $table->string('last_name');
                $table->string('brand_name');
                $table->string('phone_number');
                $table->string('device_model')->nullable();
                $table->string('imei_number', 15)->nullable();
                $table->string('device_color')->nullable();
                $table->string('device_status')->nullable();
                $table->string('device_mode')->nullable();
                $table->string('repair_type');
                $table->text('description')->nullable();
                $table->string('possible_time')->nullable();
                $table->date('delivery_date')->nullable();
                $table->date('visit_date')->nullable();
                $table->unsignedInteger('repair_cost')->nullable();
                $table->timestamps();
            });
        }
    }
    public function down(): void
    {
        Schema::dropIfExists('device_repair_forms');
    }
};
