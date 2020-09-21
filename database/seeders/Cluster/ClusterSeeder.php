<?php

namespace Database\Seeders\Cluster;

use Database\Seeders\Cluster\IndonesiaSeeder;
use Database\Seeders\Cluster\LabelSeeder;
use Illuminate\Database\Seeder;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IndonesiaSeeder::class);
        $this->call(LabelSeeder::class);
    }
}
