<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable()->index();
        $table->unsignedBigInteger('admin_id')->nullable()->index();
        $table->string('name');
        $table->string('barcode')->nullable();
        $table->string('category')->nullable();
        $table->decimal('buy_price', 15, 2)->default(0);
        $table->string('status')->default('نو');
        $table->string('company')->nullable();
        $table->decimal('sell_price_retail', 15, 2)->nullable();
        $table->decimal('sell_price_wholesale', 15, 2)->default(0);
        $table->decimal('total_buy', 15, 2)->default(0);
        $table->decimal('paid_amount', 15, 2)->default(0);
        $table->integer('quantity')->default(0);
        $table->string('image')->nullable();
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
