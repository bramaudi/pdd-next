<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LingkunganSeeder::class);
        $this->call(LingkunganRWSeeder::class);
        $this->call(LingkunganRTSeeder::class);
        $this->call(KeluargaSeeder::class);
    }
}
