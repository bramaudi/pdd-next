<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Kependudukan extends Seeder {

    public function run() {
        
        /**
         * Penduduk
         */
        Permission::firstOrCreate(['name' => 'penduduk.create']);
        Permission::firstOrCreate(['name' => 'penduduk.read']);
        Permission::firstOrCreate(['name' => 'penduduk.update']);
        Permission::firstOrCreate(['name' => 'penduduk.delete']);
    
        /**
         * Keluarga
         */
        Permission::firstOrCreate(['name' => 'keluarga.create']);
        Permission::firstOrCreate(['name' => 'keluarga.read']);
        Permission::firstOrCreate(['name' => 'keluarga.update']);
        Permission::firstOrCreate(['name' => 'keluarga.delete']);

    }

}