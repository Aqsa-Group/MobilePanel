<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
 public function up()
{
    Schema::table('cash_receipts', function (Blueprint $table) {
        $table->string('currency')->default('AFN');
    });
}
    public function down(): void
    {
        Schema::table('cash_receipts', function (Blueprint $table) {
        });
    }
};
