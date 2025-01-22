<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_matapelajaran');
            $table->string('nama_pelajaran');
            $table->unsignedBigInteger('id_guru');
            $table->string('nama_guru');
            $table->json('daftar_siswa');
            $table->json('nilai_harian1');
            $table->json('nilai_harian2');
            $table->json('nilai_harian3');
            $table->json('nilai_harian4');
            $table->json('nilai_harian5');
            $table->json('uts');
            $table->json('uas');
            $table->json('kehadiran');
            $table->json('sikap');
            $table->timestamps();

            $table->decimal('rata_rata', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_nilai');
    }
}