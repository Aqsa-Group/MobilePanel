<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('withdrawal_type');
            $table->decimal('amount', 10, 2);
            $table->text('description');
            $table->date('withdrawal_date');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('withdrawals');
    }
};
