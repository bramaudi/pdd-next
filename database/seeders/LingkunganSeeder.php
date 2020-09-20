<?php

namespace Database\Seeders;

use App\Models\Cluster\Lingkungan;
use Illuminate\Database\Seeder;

class LingkunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lingkungan::factory()
                        ->times(18)
                        ->create();
    }
}
