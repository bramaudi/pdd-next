<?php

namespace Database\Seeders;

use App\Models\Cluster\Rw;
use Illuminate\Database\Seeder;

class LingkunganRWFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rw::factory()
                ->times(18 * 18 + 10)
                ->create();
    }
}
