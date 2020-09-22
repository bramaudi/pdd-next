<?php

namespace Database\Seeders\Sistem\HakAkses;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Sistem extends Seeder {

    public function run() {
        
        /**
         * Pengguna
         */
        Permission::firstOrCreate(['name' => 'user.create']);
        Permission::firstOrCreate(['name' => 'user.read']);
        Permission::firstOrCreate(['name' => 'user.update']);
        Permission::firstOrCreate(['name' => 'user.delete']);

    }

}