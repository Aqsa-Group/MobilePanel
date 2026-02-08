<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
        $table->id();
        $table->decimal('amount', 12, 2)->default(0);
        $table->decimal('paid_amount', 12, 2)->default(0);
        $table->unsignedBigInteger('customer_id')->nullable();
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
