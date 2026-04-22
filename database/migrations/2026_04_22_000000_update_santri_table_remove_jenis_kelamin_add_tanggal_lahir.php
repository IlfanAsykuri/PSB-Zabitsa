<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
            $table->date('tanggal_lahir')->after('nama')->nullable();
        });
    }

    public function down()
    {
        Schema::table('santri', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L')->after('nama');
            $table->dropColumn('tanggal_lahir');
        });
    }
};
