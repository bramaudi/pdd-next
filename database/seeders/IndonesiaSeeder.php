<?php

namespace Database\Seeders;

use Closure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndonesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->provincesSeeder()
             ->regenciesSeeder()
             ->districtsSeeder()
             ->villagesSeeder();
    }

    protected function loop(array $input, Closure $fn): self
    {
        $count = count($input);
        $side = ceil($count / 1500);

        for($i = 0; $i <= $side; $i += 1)
        {
            $data = [];

            for($j = $i * 1500; $j < ($i + 1) * 1500 && $j < $count; $j += 1)
            {
                $data[] = $input[$j];
            }

            call_user_func($fn, $data);
        }

        return $this;
    }

    protected function provincesSeeder(): self
    {
        $data = file(base_path('database/seeders/data/indonesia/provinces.csv'));

        return $this->loop($data, function ($data) {

            $provinces = [];

            foreach ($data as $row) {

                $col = explode(',', $row);

                $provinces[] = ["id" => $col[0], "name" => trim($col[1])];
            }

            DB::table('provinces')->insert($provinces);
        });
    }

    protected function regenciesSeeder(): self
    {
        $data = file(base_path('database/seeders/data/indonesia/regencies.csv'));

        return $this->loop($data, function ($data) {

            $regencies = [];

            foreach ($data as $row) {

                $col = explode(',', $row);

                $regencies[] = ['id' => $col[0], 'province_id' => $col[1], 'name' => trim($col[2])];
            }

            DB::table('regencies')->insert($regencies);
        });
    }

    protected function districtsSeeder(): self
    {
        $data = file(base_path('database/seeders/data/indonesia/districts.csv'));

        return $this->loop($data, function ($data) {

            $districs = [];

            foreach ($data as $row) {

                $col = explode(',', $row);

                $districs[] = ['id' => $col[0], 'regency_id' => $col[1], 'name' => trim($col[2])];
            }

            DB::table('districts')->insert($districs);
        });
    }

    protected function villagesSeeder(): self
    {
        $data = file(base_path('database/seeders/data/indonesia/villages.csv'));

        return $this->loop($data, function ($data) {

            $villages = [];

            foreach ($data as $row) {

                $col = explode(',', $row);

                $villages[] = ['id' => $col[0], 'district_id' => $col[1], 'name' => trim($col[2])];
            }

            DB::table('villages')->insert($villages);
        });
    }
}
