<?php

namespace Database\Seeders;

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
        foreach (glob(base_path('database/seeders/data/label/*.txt')) as $file) {

            $kategori = Label::firstOrCreate(['label' => Str::slug(pathinfo($file, PATHINFO_FILENAME))]);

            foreach (file($file) as $line) {

                $kategori->turunan()->firstOrCreate(['label' => trim($line)]);
            }
        }
    }
}
