<?php

namespace Database\Seeders\Kependudukan;

use App\Models\Kependudukan\Keluarga;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = 100;

        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $times);

        for ($i = 0; $i < $times; $i++) {

            Keluarga::factory()->hasAnggota(random_int(3, 10))->create();

            $progressBar->advance();

        }

        $progressBar->finish();
        $output->write("\n");

        $this->call(KepalaKeluargaSeeder::class);
    }
}
