<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
 public function up()
{
    Schema::create('cash_funds', function (Blueprint $table) {
        $table->id();
        $table->decimal('afn_balance', 15, 2)->default(0);
        $table->decimal('usd_balance', 15, 2)->default(0);
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('cash_funds');
    }
};
