<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->decimal('sell_price_wholesale', 15, 2)->default(0);
    });
}
public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('sell_price_wholesale');
    });
}
};
