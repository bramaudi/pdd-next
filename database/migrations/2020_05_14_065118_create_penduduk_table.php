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
            $table->unsignedBigInteger('nik_ayah');
            $table->unsignedBigInteger('nik_ibu');
            $table->unsignedBigInteger('keluarga_id');
            $table->unsignedBigInteger('rt_id');
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->unsignedSmallInteger('agama_id');
            $table->unsignedSmallInteger('jenis_kelamin_id');
            $table->unsignedSmallInteger('golongan_darah_id');
            $table->unsignedSmallInteger('kewarganegaraan_id');
            $table->unsignedSmallInteger('status_perkawinan_id');
            $table->unsignedSmallInteger('status_kependudukan_id');
            $table->unsignedSmallInteger('pekerjaan_id');
            $table->unsignedSmallInteger('pendidikan_id');
            $table->unsignedSmallInteger('hubungan_keluarga_id');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
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
