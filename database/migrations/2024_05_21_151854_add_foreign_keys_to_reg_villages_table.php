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
        Schema::table('reg_villages', function (Blueprint $table) {
            $table->foreign(['district_id'], 'fk_district')->references(['id'])->on('reg_districts')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reg_villages', function (Blueprint $table) {
            $table->dropForeign('fk_district');
        });
    }
};
