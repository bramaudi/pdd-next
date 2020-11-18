<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Kependudukan extends Seeder {

    public function run() {
        
        /**
         * Penduduk
         */
        Permission::firstOrCreate(['name' => 'kependudukan_penduduk']);
    
        /**
         * Keluarga
         */
        Permission::firstOrCreate(['name' => 'kependudukan_keluarga']);

    }

}