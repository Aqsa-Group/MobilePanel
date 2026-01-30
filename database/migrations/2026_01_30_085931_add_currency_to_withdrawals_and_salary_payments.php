<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
{
    Schema::table('withdrawals', function (Blueprint $table) {
        if (!Schema::hasColumn('withdrawals', 'currency')) {
            $table->string('currency', 10)->default('AFN')->after('amount');
        }
    });
    Schema::table('salary_payments', function (Blueprint $table) {
        if (!Schema::hasColumn('salary_payments', 'currency')) {
            $table->string('currency', 10)->default('AFN')->after('amount');
        }
    });
}
public function down(): void
{
    Schema::table('withdrawals', function (Blueprint $table) {
        if (Schema::hasColumn('withdrawals', 'currency')) {
            $table->dropColumn('currency');
        }
    });
    Schema::table('salary_payments', function (Blueprint $table) {
        if (Schema::hasColumn('salary_payments', 'currency')) {
            $table->dropColumn('currency');
        }
    });
}
};
