<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
    Schema::table('loans', function (Blueprint $table) {
    $table->unsignedBigInteger('admin_id')->nullable();
});
Schema::table('cash_receipts', function (Blueprint $table) {
    $table->unsignedBigInteger('admin_id')->nullable();
});
    }
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            //
        });
    }
};
