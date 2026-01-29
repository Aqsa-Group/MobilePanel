<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   public function up()
{
    Schema::table('user_forms', function (Blueprint $table) {
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->unsignedBigInteger('creator_id')->nullable();
        $table->unsignedBigInteger('admin_id')->nullable();
        $table->rememberToken();
    });
}
public function down()
{
    Schema::table('user_forms', function (Blueprint $table) {
        $table->dropColumn([
            'first_name',
            'last_name',
            'creator_id',
            'admin_id',
            'remember_token'
        ]);
    });
}
};
