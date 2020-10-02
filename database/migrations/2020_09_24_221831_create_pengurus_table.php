<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id')->nullable();
            $table->unsignedBigInteger('nip');
            $table->unsignedBigInteger('nik');
            $table->unsignedBigInteger('niap')->nullable();
            $table->unsignedBigInteger('no_sk');
            $table->unsignedBigInteger('no_henti');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('rt_id')->nullable();
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->unsignedBigInteger('keluarga_id')->nullable();
            $table->unsignedBigInteger('jenis_kelamin_id')->nullable();
            $table->unsignedBigInteger('golongan_darah_id')->nullable();
            $table->unsignedBigInteger('kewarganegaraan_id')->nullable();
            $table->unsignedBigInteger('status_perkawinan_id')->nullable();
            $table->unsignedBigInteger('pekerjaan_id')->nullable();
            $table->unsignedBigInteger('pendidikan_id')->nullable();
            $table->unsignedBigInteger('pangkat_id')->nullable();
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->tinyInteger('is_kepala')->nullable();
            $table->string('ponsel')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('masa_jabatan')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->date('tgl_sk');
            $table->date('tgl_henti');
            $table->text('tupoksi')->nullable();
            $table->tinyInteger('ttd')->nullable();
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
        Schema::dropIfExists('pengurus');
    }
}
