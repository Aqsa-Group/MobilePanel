<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->text('address');
            $table->enum('customer_type', ['مشتری جدید', 'مشتری همیشه گی',]);
            $table->string('id_card', 20)->unique();
            $table->string('customer_number', 10);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
