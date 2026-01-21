<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
{
    Schema::table('user_forms', function (Blueprint $table) {
        $table->unsignedBigInteger('creator_id')->after('password'); // بعد از password
        $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
    });
}
public function down()
{
    Schema::table('user_forms', function (Blueprint $table) {
        $table->dropForeign(['creator_id']);
        $table->dropColumn('creator_id');
    });
}
};
