<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Sistem extends Seeder {

    public function run() {
        
        /**
         * Pengguna
         */
        Permission::firstOrCreate(['name' => 'sistem_pengguna']);


        /**
         * Jabatan
         */
        Permission::firstOrCreate(['name' => 'sistem_jabatan']);

    }

}