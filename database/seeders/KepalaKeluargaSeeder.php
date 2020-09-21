<?php

namespace Database\Seeders;

use App\Models\Kependudukan\Penduduk;
use App\Models\Kependudukan\Keluarga;
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
        foreach(Keluarga::all() as $keluarga) {
            // Cari keluarga yang tidak ada kepala keluarganya
            $kepalaKeluarga = Penduduk::whereNotNull('is_kepala')
                                ->where('keluarga_id', $keluarga->id)
                                ->orderBy('tanggal_lahir') // paling tua
                                ->first();

            // Buatkan kepala keluarga
            if (!$kepalaKeluarga) {
                $kepala = Penduduk::where('keluarga_id', $keluarga->id)
                            ->orderBy('tanggal_lahir') // paling tua
                            ->first();
                $kepala->is_kepala = 1;
                $kepala->save();
            }
        }
    }
}
