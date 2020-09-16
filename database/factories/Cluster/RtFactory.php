<?php

namespace Database\Factories\Cluster;

use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use Illuminate\Database\Eloquent\Factories\Factory;

class RtFactory extends Factory
{
    protected $model = Rt::class;

    public function definition()
    {
        return [
            'nomor' => $this->faker->numberBetween(0, 10),
            'rw_id' => Rw::all()->random()->id
        ];
    }
}
