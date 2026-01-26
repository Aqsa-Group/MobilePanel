<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('nid')->nullable();
        $table->string('number')->nullable();
        $table->string('address')->nullable();
        $table->decimal('salary', 12, 2);
        $table->string('job')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
