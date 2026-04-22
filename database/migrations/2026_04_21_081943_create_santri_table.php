<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->string('kode_pendaftaran')->primary();
            $table->string('kode_lembaga');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('negara')->default('Indonesia');
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('nama_pendidikan_terakhir');
            $table->string('nama_wali');
            $table->string('nomor_wa_wali');
            $table->year('tahun_masuk');
            $table->enum('status_kedatangan', ['belum_datang', 'sudah_datang'])->default('belum_datang');
            $table->enum('status_verifikasi', ['proses', 'diverifikasi', 'ditolak'])->default('proses');
            $table->timestamps();

            $table->foreign('kode_lembaga')->references('kode_lembaga')->on('lembaga_pendidikan')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};
