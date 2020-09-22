<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Desa extends Seeder {

    public function run() {
        
        /**
         * Identitas Desa
         */
        Permission::firstOrCreate(['name' => 'config.read']);
        Permission::firstOrCreate(['name' => 'config.update']);

        /**
         * Wilayah Administratif
         */
        Permission::firstOrCreate(['name' => 'user.create']);
        Permission::firstOrCreate(['name' => 'user.read']);
        Permission::firstOrCreate(['name' => 'user.update']);
        Permission::firstOrCreate(['name' => 'user.delete']);
        
    }

}