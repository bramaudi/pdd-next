<?php

namespace Database\Seeders\Cluster;

use App\Models\Cluster\Rw;
use Illuminate\Database\Seeder;

class LingkunganRWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 18 * 18 + 10;

        $output = $this->command->getOutput();

        $output->progressStart($count);

        for ($i = 0; $i < $count; $i++) {

            Rw::factory()->create();

            $output->progressAdvance();
        }

        $output->progressFinish();
    }
}
