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
        Schema::table('kota', function (Blueprint $table) {
            $table->foreign(['id_provinsi'],'fk_provinsi')->references(['id'])->on('provinsi')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kota', function (Blueprint $table) {
            $table->dropForeign('fk_provinsi');
        });
    }
};
