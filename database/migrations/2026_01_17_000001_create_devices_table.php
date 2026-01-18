<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
  public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('status')->nullable();
            $table->string('model')->nullable();
            $table->string('memory')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->decimal('buy_price');
            $table->decimal('sell_price');
            $table->integer('stock');
            $table->string('imei')->unique();
            $table->string('warranty');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('device');
    }
};
