<?php

namespace Database\Seeders\Sistem;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Pengguna
         */
        Permission::firstOrCreate(['name' => 'user.create']);
        Permission::firstOrCreate(['name' => 'user.read']);
        Permission::firstOrCreate(['name' => 'user.update']);
        Permission::firstOrCreate(['name' => 'user.delete']);

        /**
         * Ubah Identitas Desa
         */
        Permission::firstOrCreate(['name' => 'config.read']);
        Permission::firstOrCreate(['name' => 'config.update']);
    }
}
