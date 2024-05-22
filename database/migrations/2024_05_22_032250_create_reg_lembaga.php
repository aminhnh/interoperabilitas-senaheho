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
        Schema::create('reg_lembaga', function (Blueprint $table) {
            $table->char('id',4)->primary();
            $table->char('id_role', 4)->index('fk_role')->nullable(false);
            $table->char('id_kelurahan', 4)->index('fk_kelurahan')->nullable(false);
            $table->string('jenis')->nullable(false);
            $table->string('nama')->nullable(false);
            $table->string('alamat')->nullable(false);
            $table->char('kode_pos',5)->nullable(false);
            $table->string('no_telepon')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_lembaga');
    }
};
