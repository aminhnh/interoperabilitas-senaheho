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
        Schema::table('reg_regencies', function (Blueprint $table) {
            $table->foreign(['province_id'], 'fk_province')->references(['id'])->on('reg_provinces')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reg_regencies', function (Blueprint $table) {
            $table->dropForeign('fk_province');
        });
    }
};
