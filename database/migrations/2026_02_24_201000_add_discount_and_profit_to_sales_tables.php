<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loan_sells', function (Blueprint $table) {
            if (!Schema::hasColumn('loan_sells', 'discount_amount')) {
                $table->decimal('discount_amount', 12, 2)->default(0)->after('sell_price');
            }
            if (!Schema::hasColumn('loan_sells', 'profit_total')) {
                $table->decimal('profit_total', 12, 2)->default(0)->after('discount_amount');
            }
        });

        Schema::table('cash_sells', function (Blueprint $table) {
            if (!Schema::hasColumn('cash_sells', 'discount_amount')) {
                $table->decimal('discount_amount', 12, 2)->default(0)->after('sell_price_retail');
            }
        });
    }

    public function down(): void
    {
        Schema::table('loan_sells', function (Blueprint $table) {
            if (Schema::hasColumn('loan_sells', 'discount_amount')) {
                $table->dropColumn('discount_amount');
            }
            if (Schema::hasColumn('loan_sells', 'profit_total')) {
                $table->dropColumn('profit_total');
            }
        });

        Schema::table('cash_sells', function (Blueprint $table) {
            if (Schema::hasColumn('cash_sells', 'discount_amount')) {
                $table->dropColumn('discount_amount');
            }
        });
    }
};

