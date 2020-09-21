<?php

namespace Database\Seeders;

use Database\Seeders\Cluster\ClusterSeeder;
use Database\Seeders\Kependudukan\KependudukanSeeder;
use Database\Seeders\Sistem\SistemSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SistemSeeder::class);        
        $this->call(ClusterSeeder::class);

        // $this->call(FactorySeeder::class); // Untuk dummy,
    }
}
