<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            if (!Schema::hasColumn('devices', 'barcode')) {
                $table->string('barcode')->unique()->nullable()->after('id');
            }
            if (!Schema::hasColumn('devices', 'buy_price')) {
                $table->decimal('buy_price', 15, 2)->default(0)->after('status');
            }
            if (!Schema::hasColumn('devices', 'sell_price_retail')) {
                $table->decimal('sell_price_retail', 15, 2)->nullable()->after('buy_price');
            }
            if (!Schema::hasColumn('devices', 'sell_price_wholesale')) {
                $table->decimal('sell_price_wholesale', 15, 2)->nullable()->after('sell_price_retail');
            }
            if (!Schema::hasColumn('devices', 'total_buy')) {
                $table->decimal('total_buy', 15, 2)->nullable()->after('sell_price_wholesale');
            }
            if (!Schema::hasColumn('devices', 'paid_amount')) {
                $table->decimal('paid_amount', 15, 2)->nullable()->after('total_buy');
            }
            if (!Schema::hasColumn('devices', 'quantity')) {
                $table->unsignedInteger('quantity')->default(0)->after('paid_amount');
            }
            if (!Schema::hasColumn('devices', 'image')) {
                $table->string('image')->nullable()->after('quantity');
            }
            if (!Schema::hasColumn('devices', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('image')
                    ->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('devices', 'admin_id')) {
                $table->foreignId('admin_id')->nullable()->after('user_id')
                    ->constrained('users')->nullOnDelete();
            }
        });
    }
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            if (Schema::hasColumn('devices', 'user_id')) {
                try { $table->dropConstrainedForeignId('user_id'); } catch (\Throwable $e) {}
            }
            if (Schema::hasColumn('devices', 'admin_id')) {
                try { $table->dropConstrainedForeignId('admin_id'); } catch (\Throwable $e) {}
            }
            foreach ([
                'barcode',
                'buy_price',
                'sell_price_retail',
                'sell_price_wholesale',
                'total_buy',
                'paid_amount',
                'quantity',
                'image',
            ] as $col) {
                if (Schema::hasColumn('devices', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
