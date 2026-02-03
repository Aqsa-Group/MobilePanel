<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
       Schema::create('loans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
    $table->decimal('amount', 12, 2);
    $table->text('note')->nullable();
    $table->date('loan_date');
    $table->timestamps();
});
    }
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
