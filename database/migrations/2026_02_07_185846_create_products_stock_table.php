<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_stock', function (Blueprint $table) {
        $table->id();
        $table->string('category')->nullable();
        $table->string('brand')->nullable();
        $table->string('status')->nullable();
        $table->string('model')->nullable();
        $table->decimal('buy_price', 8, 2);
        $table->integer('stock');
        $table->string('imei')->index();
        $table->unsignedBigInteger('admin_id')->nullable();
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('products_stock');
    }
};
