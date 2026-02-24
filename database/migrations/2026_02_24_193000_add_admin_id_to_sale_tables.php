<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loan_sells', function (Blueprint $table) {
            if (!Schema::hasColumn('loan_sells', 'admin_id')) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('product_stock_id');
            }
        });

        Schema::table('cash_sells', function (Blueprint $table) {
            if (!Schema::hasColumn('cash_sells', 'admin_id')) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('address');
            }
        });
    }

    public function down(): void
    {
        Schema::table('loan_sells', function (Blueprint $table) {
            if (Schema::hasColumn('loan_sells', 'admin_id')) {
                $table->dropColumn('admin_id');
            }
        });

        Schema::table('cash_sells', function (Blueprint $table) {
            if (Schema::hasColumn('cash_sells', 'admin_id')) {
                $table->dropColumn('admin_id');
            }
        });
    }
};

