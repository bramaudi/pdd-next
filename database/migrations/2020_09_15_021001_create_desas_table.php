<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->char('nama');
            $table->char('email');
            $table->char('telepon');
            $table->char('website');
            $table->char('tentang')->nullable();
            $table->char('logo')->nullable();

            $table->char('kode_desa');
            $table->char('kode_pos', 6);
            
            $table->char('kepala_desa_nama');
            $table->char('kepala_desa_nip');
            
            $table->char('kepala_camat_nama');
            $table->char('kepala_camat_nip');
            
            $table->char('kecamatan_nama');
            $table->char('kecamatan_kode');
            
            $table->char('kabupaten_nama');
            $table->char('kabupaten_kode');

            $table->char('provinsi_nama');
            $table->char('provinsi_kode');

            $table->char('map_lat', 20);
            $table->char('map_lng', 20);
            $table->char('map_tipe', 20);
            $table->text('map_path');
            $table->tinyInteger('map_zoom');

            $table->char('google_analytic')->nullable();

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
        Schema::dropIfExists('desas');
    }
}
