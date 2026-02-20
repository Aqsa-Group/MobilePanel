<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('loan_sells', function (Blueprint $table) {
        $table->foreignId('product_stock_id')
              ->nullable()
              ->constrained('products_stock')
              ->nullOnDelete();
    });
}

public function down()
{
    Schema::table('loan_sells', function (Blueprint $table) {
        $table->dropConstrainedForeignId('product_stock_id');
    });
}
};
