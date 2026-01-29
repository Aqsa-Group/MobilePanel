<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained('customers');
        $table->decimal('total_price', 12, 2);
        $table->text('note')->nullable();
        $table->timestamps();
    });

    Schema::create('inventories', function (Blueprint $table) {
        $table->id();
        $table->string('category');
        $table->string('model');
        $table->string('color')->nullable();
        $table->string('serial')->nullable();
        $table->decimal('price', 12, 2);
        $table->foreignId('customer_id')->constrained('customers');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('inventories');
    Schema::dropIfExists('sales');
}

};
