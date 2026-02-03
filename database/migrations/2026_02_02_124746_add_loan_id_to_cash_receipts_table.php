<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::table('cash_receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_id')->nullable()->after('customer_id');
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('set null');
        });
    }
    public function down()
    {
        Schema::table('cash_receipts', function (Blueprint $table) {
            $table->dropForeign(['loan_id']);
            $table->dropColumn('loan_id');
        });
    }
};
