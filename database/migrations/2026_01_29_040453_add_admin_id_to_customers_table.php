<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   public function up()
{
    Schema::table('customers', function (Blueprint $table) {
        $table->unsignedBigInteger('admin_id')->nullable()->after('image');
    });
}
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
