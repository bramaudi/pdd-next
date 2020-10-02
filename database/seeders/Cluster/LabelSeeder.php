<?php

namespace Database\Seeders\Cluster;

use Illuminate\Database\Seeder;

use App\Models\Label\Label;
use Illuminate\Support\Str;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = glob(base_path('database/seeders/_data/label/*.txt'));

        $output = $this->command->getOutput();

        // Mulai tampilkan progress bar
        $output->progressStart(count($labels));

        foreach ($labels as $file) {

            $kategori = Label::firstOrCreate(['label' => Str::slug(pathinfo($file, PATHINFO_FILENAME))]);

            foreach (file($file) as $line) {

                $kategori->turunan()->firstOrCreate(['label' => trim($line)]);

            }

            // Majukan progress bar
            $output->progressAdvance();

        }

        $output->progressFinish();
    }
}
