<?php

namespace Database\Seeders;

use Database\Seeders\Cluster\LingkunganRTSeeder;
use Database\Seeders\Cluster\LingkunganRWSeeder;
use Database\Seeders\Cluster\LingkunganSeeder;
use Database\Seeders\Kependudukan\KependudukanSeeder;
use Database\Seeders\Sistem\UserSeeder;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
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
        
        $this->call(KependudukanSeeder::class);
        $this->call(UserSeeder::class);
    }
}
