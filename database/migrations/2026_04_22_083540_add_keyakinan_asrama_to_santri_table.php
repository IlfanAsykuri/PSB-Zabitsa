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
        Schema::table('santri', function (Blueprint $table) {
            $table->enum('keyakinan_asrama', ['sangat_yakin', 'yakin', 'ragu'])->default('sangat_yakin')->after('status_verifikasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('santri', function (Blueprint $table) {
            $table->dropColumn('keyakinan_asrama');
        });
    }
};
