<?php

namespace Database\Seeders\Cluster;

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
        $count = 18 * 18 + 10 * 18 + 100;

        $output = $this->command->getOutput();

        $output->progressStart($count);

        for ($i = 0; $i < $count; $i++) {

            Rt::factory()->create();

            $output->progressAdvance();
        }

        $output->progressFinish();
    }
}
