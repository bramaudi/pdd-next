<?php

namespace Database\Seeders\Cluster;

use Illuminate\Database\Seeder;

use App\Models\Label\Label;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        
        $output = new ConsoleOutput();

        $progressBar = new ProgressBar($output, count($labels));

        // Mulai tampilkan progress bar
        $progressBar->start();

        foreach ($labels as $file) {

            $kategori = Label::firstOrCreate(['label' => Str::slug(pathinfo($file, PATHINFO_FILENAME))]);

            foreach (file($file) as $line) {

                $kategori->turunan()->firstOrCreate(['label' => trim($line)]);

            }
            
            // Majukan progress bar
            $progressBar->advance();

        }
        
        $progressBar->finish();

        // Add newline
        $output->write("\n");

    }
}
