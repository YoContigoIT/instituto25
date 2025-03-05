<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('course_prices', function (Blueprint $table) {
            //
            $table->decimal('platform_fee', 10, 2)->default(0)->after('currency_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_prices', function (Blueprint $table) {
            //
            $table->dropColumn('platform_fee');
        });
    }
};
