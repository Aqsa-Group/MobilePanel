<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
{
    Schema::create('devices', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category')->nullable();
        $table->string('brand')->nullable();
        $table->string('status')->default('available');
        $table->unsignedBigInteger('admin_id')->nullable();
        $table->timestamps();
        $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
    });
}
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
