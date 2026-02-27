<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('stores', 'admin_user_id')) {
            Schema::table('stores', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_user_id')->nullable()->after('id');
                $table->index('admin_user_id');
                $table->unique('admin_user_id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('stores', 'admin_user_id')) {
            Schema::table('stores', function (Blueprint $table) {
                $table->dropUnique('stores_admin_user_id_unique');
                $table->dropIndex('stores_admin_user_id_index');
                $table->dropColumn('admin_user_id');
            });
        }
    }
};

