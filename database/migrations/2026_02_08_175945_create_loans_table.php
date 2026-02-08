<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
   public function up()
{
    Schema::create('loans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->unsignedBigInteger('admin_id')->nullable();
        $table->decimal('amount', 12, 2);
        $table->string('status')->default('pending');
        $table->date('loan_date')->nullable();
        $table->timestamps();
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
    });
}
public function down()
{
    Schema::dropIfExists('loans');
}
};
