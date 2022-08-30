<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_siswa', function (Blueprint $table) {
            $table->id('id_presensi');
            $table->string('tanggal');
            $table->string('jam_presensi')->nullable();
            $table->integer('nisn');
            $table->string('nama_siswa');
            $table->string('mata_pelajaran');
            $table->string('kelas');
            $table->string('nip');
            $table->string('kehadiran')->default("Tidak Hadir");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi_siswa');
    }
};
