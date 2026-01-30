<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('profit_each')->change();
            $table->bigInteger('profit_total')->change();
        });
    }
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('profit_each')->change();
            $table->integer('profit_total')->change();
        });
    }
};
