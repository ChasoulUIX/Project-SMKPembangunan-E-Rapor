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
        Schema::create('daftar_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->string('wali_kelas');
            $table->string('jurusan');
            $table->json('daftar_siswa')->nullable(); // Menyimpan array ID siswa
            $table->timestamps();
        });
    }

};
