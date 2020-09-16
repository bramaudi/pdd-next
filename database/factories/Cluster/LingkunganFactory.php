<?php

namespace Database\Factories\Cluster;

use App\Models\Cluster\Lingkungan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LingkunganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lingkungan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 'nama' => $this->faker->streetName ];
    }
}
