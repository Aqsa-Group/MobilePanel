<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
       Schema::create('balances', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->nullable();
    $table->decimal('amount', 15, 2)->default(0);
    $table->decimal('paid_amount', 15, 2)->default(0);
    $table->timestamps();
});
    }
    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
