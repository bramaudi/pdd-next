<?php

namespace Database\Seeders;

use App\Models\Cluster\Penduduk;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penduduk::factory()
                    ->times(50)
                    ->create();
    }
}
