<?php

namespace Database\Seeders;

use App\Models\Cluster\Rt;
use Illuminate\Database\Seeder;

class LingkunganRTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rt::factory()
                ->times(18 * 18 + 10 * 18 + 100)
                ->create();
    }
}
