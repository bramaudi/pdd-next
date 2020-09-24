<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Desa extends Seeder {

    public function run() {
        
        /**
         * Identitas Desa
         */
        Permission::firstOrCreate(['name' => 'config.update']);

        /**
         * Wilayah Administratif
         */
        Permission::firstOrCreate(['name' => 'pejabat.create']);
        Permission::firstOrCreate(['name' => 'pejabat.read']);
        Permission::firstOrCreate(['name' => 'pejabat.update']);
        Permission::firstOrCreate(['name' => 'pejabat.delete']);
        
    }

}