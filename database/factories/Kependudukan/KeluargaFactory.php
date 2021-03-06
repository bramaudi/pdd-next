<?php

namespace Database\Factories\Kependudukan;

use App\Models\Kependudukan\Keluarga;
use App\Models\Cluster\Rt;
use App\Models\Meta\Meta;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Keluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_kk'         => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'rt_id'         => Rt::all()->random()->id
        ];
    }
}
