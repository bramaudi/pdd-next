<?php

namespace Database\Factories\Penduduk;

use App\Models\Penduduk\Keluarga;
use App\Models\Cluster\Rt;
use App\Models\Indonesia\District;
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
        $config = json_decode(Meta::where('key', 'portal-desa-digital')->first()->value);

        return [
            'no_kk'         => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'rt_id'         => Rt::all()->random()->id,
            'district_id'   => District::where('regency_id', $config->regency_id)->get()->random()->id,
        ];
    }
}
