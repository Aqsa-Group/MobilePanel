<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->string('currency')->default('AFN'); // نوع ارز پیش‌فرض
        });
        Schema::table('salary_payments', function (Blueprint $table) {
            $table->string('currency')->default('AFN');
        });
    }
    public function down()
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->dropColumn('currency');
        });
        Schema::table('salary_payments', function (Blueprint $table) {
            $table->dropColumn('currency');
        });
    }
};
