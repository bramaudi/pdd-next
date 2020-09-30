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
            $table->unsignedBigInteger('rt_id');
            $table->unsignedBigInteger('dokumen_paspor')->nullable();
            $table->unsignedBigInteger('dokumen_kitas')->nullable();
            $table->unsignedBigInteger('no_kk_sebelumnya')->nullable();
            $table->unsignedBigInteger('keluarga_id')->nullable();
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
            $table->unsignedSmallInteger('tempat_dilahirkan_id');
            $table->unsignedSmallInteger('penolong_kelahiran_id');
            $table->unsignedSmallInteger('jenis_kelahiran_id');
            $table->unsignedTinyInteger('ktp_el_id');
            $table->unsignedTinyInteger('status_rekam_id');
            $table->unsignedTinyInteger('cacat_id');
            $table->unsignedTinyInteger('sakit_menahun_id');
            $table->unsignedTinyInteger('cara_kb_id')->nullable();
            $table->unsignedTinyInteger('kelahiran_anak_ke');
            $table->unsignedTinyInteger('berat_lahir');
            $table->unsignedTinyInteger('panjang_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('akta_lahir');
            $table->string('akta_kawin')->nullable();
            $table->string('akta_cerai')->nullable();
            $table->string('ponsel');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('alamat_sebelumnya')->nullable();
            $table->date('tanggal_lahir');
            $table->date('tanggal_kawin')->nullable();
            $table->date('tanggal_cerai')->nullable();
            $table->date('tanggal_akhir_paspor')->nullable();
            $table->time('waktu_lahir');
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
