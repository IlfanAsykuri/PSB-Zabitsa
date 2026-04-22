<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logistik', function (Blueprint $table) {
            $table->string('kode_logistik')->primary();
            $table->string('nama_logistik');
            $table->enum('kategori', ['seragam', 'buku', 'lainnya'])->default('seragam');
            $table->enum('status', ['aktif', 'tidak'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logistik');
    }
};
