<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('quantity')->default(0);
        $table->decimal('total_buy', 10, 2)->default(0);
        $table->decimal('sell_price_retail', 10, 2)->default(0);
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
