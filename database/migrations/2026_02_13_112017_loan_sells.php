<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_sells', function (Blueprint $table) {
           $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('number');
            $table->decimal('buy_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->string('barcode')->nullable();
            $table->timestamps();
});
    }
    public function down(): void
    {
        Schema::dropIfExists('loan_sells');
    }
};
