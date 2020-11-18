<?php

namespace Database\Seeders\Sistem;

use Database\Seeders\Sistem\HakAksesSeeder;
use Database\Seeders\Sistem\JabatanOperatorSeeder;
use Database\Seeders\Sistem\JabatanSeeder;
use Database\Seeders\Sistem\MetaSeeder;
use Database\Seeders\Sistem\UserSeeder;
use Illuminate\Database\Seeder;

class SistemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JabatanSeeder::class);
        $this->call(HakAksesSeeder::class);
        $this->call(JabatanOperatorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MetaSeeder::class);
    }
}
