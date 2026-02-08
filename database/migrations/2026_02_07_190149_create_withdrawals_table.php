<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
       Schema::create('withdrawals', function (Blueprint $table) {
        $table->id();
        $table->string('withdrawal_type');
        $table->decimal('amount', 10, 2);
        $table->string('currency', 10)->default('AFN');
        $table->text('description');
        $table->date('withdrawal_date');
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
