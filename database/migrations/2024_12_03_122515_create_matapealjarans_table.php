<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matapelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel')->unique();
            $table->string('nama_mapel');
            $table->string('nama_guru');
            $table->json('daftar_siswa')->nullable(); // Menyimpan array ID siswa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matapelajarans');
    }
};