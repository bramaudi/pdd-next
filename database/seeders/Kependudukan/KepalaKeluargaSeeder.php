<?php

namespace Database\Seeders\Kependudukan;

use App\Models\Kependudukan\Penduduk;
use App\Models\Kependudukan\Keluarga;
use App\Models\Label\Label;
use Illuminate\Database\Seeder;

class KepalaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Keluarga::all() as $keluarga)
        {
            $label = Label::whereLabel('Kepala Keluarga')->first()->id;

            $kepala = $keluarga->anggota->sortBy('tanggal_lahir')->first();
            $kepala->hubungan_keluarga_id = $label;
            $kepala->save();
        }
    }
}
