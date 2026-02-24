<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loan_sells', function (Blueprint $table) {
            if (!Schema::hasColumn('loan_sells', 'quantity')) {
                $table->unsignedInteger('quantity')->default(1)->after('number');
            }
        });

        Schema::table('cash_sells', function (Blueprint $table) {
            if (!Schema::hasColumn('cash_sells', 'quantity')) {
                $table->unsignedInteger('quantity')->default(1)->after('number');
            }
        });
    }

    public function down(): void
    {
        Schema::table('loan_sells', function (Blueprint $table) {
            if (Schema::hasColumn('loan_sells', 'quantity')) {
                $table->dropColumn('quantity');
            }
        });

        Schema::table('cash_sells', function (Blueprint $table) {
            if (Schema::hasColumn('cash_sells', 'quantity')) {
                $table->dropColumn('quantity');
            }
        });
    }
};

