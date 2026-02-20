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
        Schema::create('cash_sells', function (Blueprint $table) {
           $table->id();

     $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
    $table->string('model');
    $table->string('number');
    $table->decimal('buy_price', 10, 2);
    $table->decimal('sell_price_retail', 10, 2);
$table->decimal('profit_total', 10, 2)->nullable();
    $table->string('barcode')->nullable();
    $table->string('id_card');
    $table->string('address');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_sells');
    }
};
