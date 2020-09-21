<?php

namespace Database\Seeders\Sistem;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Super Admin
         */
        Role::firstOrCreate(['name' => 'Super Admin', 'reserved' => 1]);

        /**
         * Operator
         */
        Role::firstOrCreate(['name' => 'Operator', 'reserved' => 1]);
    }
}
