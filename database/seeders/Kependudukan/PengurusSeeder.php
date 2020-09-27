<?php

namespace Database\Seeders\Kependudukan;

use App\Models\Kependudukan\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengurus::factory()
                ->times(10)
                ->create();
    }
}
