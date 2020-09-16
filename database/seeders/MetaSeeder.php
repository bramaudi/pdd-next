<?php

namespace Database\Seeders;

use App\Models\Meta\Meta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (glob(base_path('database/seeders/data/meta/*.json')) as $file) {

            Meta::firstOrCreate([

                'key'           => Str::slug(pathinfo($file, PATHINFO_FILENAME)),
                'description'   => 'system, jangan diganggu',
                'value'         => file_get_contents($file)
            ]);
        }
    }
}
