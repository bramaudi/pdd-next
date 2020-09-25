<?php

namespace Database\Seeders\Kependudukan;

use Database\Seeders\Kependudukan\KeluargaSeeder;
use Database\Seeders\Kependudukan\KepalaKeluargaSeeder;
use Database\Seeders\Kependudukan\PengurusSeeder;
use Illuminate\Database\Seeder;

class KependudukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KeluargaSeeder::class);
        $this->call(KepalaKeluargaSeeder::class);
        $this->call(PengurusSeeder::class);
    }
}
