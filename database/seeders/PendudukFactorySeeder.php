<?php

namespace Database\Seeders;

use App\Models\Cluster\Penduduk;
use Illuminate\Database\Seeder;

class PendudukFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penduduk::factory()
                    ->times(2000)
                    ->create();
    }
}
