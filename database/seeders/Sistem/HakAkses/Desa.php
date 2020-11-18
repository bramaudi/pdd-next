<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Desa extends Seeder {

    public function run() {
        
        /**
         * Identitas Desa
         */
        Permission::firstOrCreate(['name' => 'desa_identitas']);

        /**
         * Wilayah Administratif
         */
        Permission::firstOrCreate(['name' => 'desa_wilayah']);
        
    }

}