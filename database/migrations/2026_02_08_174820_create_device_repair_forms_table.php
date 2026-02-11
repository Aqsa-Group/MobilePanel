<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
       public function up()
{
    Schema::create('device_repair_forms', function (Blueprint $table) {
    $table->id();
    $table->string('category');
    $table->string('name');
    $table->string('phone_number');
    $table->string('device_model');
    $table->string('repair_type');
    $table->date('visit_date');
    $table->bigInteger('repair_cost');
    $table->text('description');
    $table->foreignId('user_id')->nullable();
    $table->foreignId('admin_id')->nullable();
    $table->timestamps();
});
}
    public function down(): void
    {
        Schema::dropIfExists('device_repair_forms');
    }
};
