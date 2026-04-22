<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('santri_logistik', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pendaftaran');
            $table->string('kode_logistik');
            $table->unsignedBigInteger('diserahkan_oleh')->nullable();
            $table->string('ukuran')->nullable();
            $table->enum('status_penyerahan', ['belum_diserahkan', 'sudah_diserahkan'])->default('belum_diserahkan');
            $table->dateTime('tanggal_diserahkan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('kode_pendaftaran')->references('kode_pendaftaran')->on('santri')->onDelete('cascade');
            $table->foreign('kode_logistik')->references('kode_logistik')->on('logistik')->onUpdate('cascade');
            $table->foreign('diserahkan_oleh')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santri_logistik');
    }
};
