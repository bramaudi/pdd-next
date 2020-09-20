<?php

namespace Database\Factories\Cluster;

use App\Models\Label\Label;
use App\Models\Cluster\Rt;
use App\Models\Penduduk\Keluarga;
use App\Models\Penduduk\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    protected $model = Penduduk::class;

    public function definition()
    {
        return [
            'nik'                   => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'nama'                  => $this->faker->name,
            'tempat_lahir'          => $this->faker->city,
            'tanggal_lahir'         => $this->faker->date,
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
        ];
    }
}
