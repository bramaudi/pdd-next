<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik');
            $table->unsignedBigInteger('keluarga_id');
            $table->unsignedBigInteger('rt_id');
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('jenis_kelamin_id');
            $table->unsignedBigInteger('golongan_darah_id');
            $table->unsignedBigInteger('kewarganegaraan_id');
            $table->unsignedBigInteger('status_perkawinan_id');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->string('ponsel');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->date('tanggal_lahir');
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
        Schema::dropIfExists('penduduk');
    }
}
