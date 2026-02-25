<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registers', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('imei');
            $table->unsignedBigInteger('submitted_by_user_id')->nullable()->after('status');
            $table->string('shop_name')->nullable()->after('submitted_by_user_id');
            $table->unsignedBigInteger('reviewed_by_admin2_id')->nullable()->after('shop_name');
            $table->timestamp('reviewed_at')->nullable()->after('reviewed_by_admin2_id');
            $table->text('review_note')->nullable()->after('reviewed_at');
            $table->json('ai_report')->nullable()->after('review_note');

            $table->index(['status', 'created_at']);
            $table->index(['submitted_by_user_id', 'status']);
            $table->index('reviewed_by_admin2_id');
        });
    }

    public function down(): void
    {
        Schema::table('registers', function (Blueprint $table) {
            $table->dropIndex(['status', 'created_at']);
            $table->dropIndex(['submitted_by_user_id', 'status']);
            $table->dropIndex(['reviewed_by_admin2_id']);

            $table->dropColumn([
                'status',
                'submitted_by_user_id',
                'shop_name',
                'reviewed_by_admin2_id',
                'reviewed_at',
                'review_note',
                'ai_report',
            ]);
        });
    }
};

