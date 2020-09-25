<?php

namespace Database\Factories\Kependudukan;

use App\Models\Cluster\Rt;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Pengurus;
use App\Models\Label\Label;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengurusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengurus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip'                   => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'nik'                   => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'no_sk'                 => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'no_henti'              => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'nama'                  => $this->faker->name,
            'tempat_lahir'          => $this->faker->city,
            'tanggal_lahir'         => $this->faker->date,
            'tgl_sk'                => $this->faker->date,
            'tgl_henti'             => $this->faker->date,
            'alamat'                => $this->faker->streetAddress,
            'ponsel'                => $this->faker->phoneNumber,
            'rt_id'                 => Rt::all()->random()->id,
            'keluarga_id'           => Keluarga::all()->random()->id,
            'jenis_kelamin_id'      => Label::whereLabel('jenis-kelamin')       ->first()->turunan->random()->id,
            'golongan_darah_id'     => Label::whereLabel('golongan-darah')      ->first()->turunan->random()->id,
            'agama_id'              => Label::whereLabel('agama')               ->first()->turunan->random()->id,
            'status_perkawinan_id'  => Label::whereLabel('status-perkawinan')   ->first()->turunan->random()->id,
            'pendidikan_id'         => Label::whereLabel('pendidikan')          ->first()->turunan->random()->id,
            'pekerjaan_id'          => Label::whereLabel('pekerjaan')           ->first()->turunan->random()->id,
            'kewarganegaraan_id'    => Label::whereLabel('kewarganegaraan')     ->first()->turunan->random()->id,
            'jabatan_id'            => Label::whereLabel('jabatan')             ->first()->turunan->random()->id,
        ];
    }
}
