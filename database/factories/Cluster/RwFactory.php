<?php

namespace Database\Factories\Cluster;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rw;
use Illuminate\Database\Eloquent\Factories\Factory;

class RwFactory extends Factory
{
    protected $model = Rw::class;

    public function definition()
    {
        return [
            'nomor' => $this->faker->numberBetween(0, 10),
            'lingkungan_id' => Lingkungan::all()->random()->id
        ];
    }
}
