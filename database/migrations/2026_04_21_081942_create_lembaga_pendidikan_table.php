<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lembaga_pendidikan', function (Blueprint $table) {
            $table->string('kode_lembaga')->primary();
            $table->string('nama_lembaga');
            $table->enum('status', ['aktif', 'tidak'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lembaga_pendidikan');
    }
};
