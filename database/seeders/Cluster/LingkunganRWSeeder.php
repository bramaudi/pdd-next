<?php

namespace Database\Seeders\Cluster;

use App\Models\Cluster\Rw;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

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

        $output = new ConsoleOutput();

        $progressBar = new ProgressBar($output, $count);

        for ($i = 0; $i < $count; $i++) {

            Rw::factory()->create();

            $progressBar->advance();

        }

        $progressBar->finish();

        $output->write("\n");

    }
}
