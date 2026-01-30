<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->decimal('profit_each', 12, 2)->default(0);
        $table->decimal('profit_total', 12, 2)->default(0);
    });
}
public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['profit_each', 'profit_total']);
    });
}
};
