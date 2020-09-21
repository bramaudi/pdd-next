<?php

namespace Database\Seeders\Cluster;

use App\Models\Cluster\Rt;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

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

        $output = new ConsoleOutput();
        
        $progressBar = new ProgressBar($output, $count);

        for ($i = 0; $i < $count; $i++) {

            Rt::factory()->create();
            
            $progressBar->advance();
        }

        $progressBar->finish();

        $output->write("\n");

    }
}
