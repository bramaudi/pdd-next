<?php

namespace Database\Factories\Kependudukan;

use App\Models\Label\Label;
use App\Models\Cluster\Rt;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    protected $model = Penduduk::class;

    public function definition()
    {
        return [
            'nik'                    => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'nik_ayah'               => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'nik_ibu'                => $this->faker->unique()->numberBetween(pow(10, 15), pow(11, 15)),
            'nama'                   => $this->faker->name,
            'nama_ayah'              => $this->faker->name,
            'nama_ibu'               => $this->faker->name,
            'tempat_lahir'           => $this->faker->city,
            'tanggal_lahir'          => $this->faker->date,
            'waktu_lahir'            => $this->faker->time(),
            'akta_lahir'             => $this->faker->uuid,
            'kelahiran_anak_ke'      => $this->faker->numberBetween(1, 5),
            'berat_lahir'            => $this->faker->numberBetween(2.9, 3.6),
            'panjang_lahir'          => $this->faker->numberBetween(44.2, 55.6),
            'alamat'                 => $this->faker->streetAddress,
            'ponsel'                 => $this->faker->phoneNumber,
            'rt_id'                  => Rt::all()->random()->id,
            'keluarga_id'            => Keluarga::all()->random()->id,
            'hubungan_keluarga_id'   => Label::whereLabel('hubungan-keluarga')   ->first()->turunan->where('label', '!=', 'Kepala Keluarga')->random()->id,
            'jenis_kelamin_id'       => Label::whereLabel('jenis-kelamin')       ->first()->turunan->random()->id,
            'golongan_darah_id'      => Label::whereLabel('golongan-darah')      ->first()->turunan->random()->id,
            'agama_id'               => Label::whereLabel('agama')               ->first()->turunan->random()->id,
            'status_perkawinan_id'   => Label::whereLabel('status-perkawinan')   ->first()->turunan->random()->id,
            'status_kependudukan_id' => Label::whereLabel('status-kependudukan') ->first()->turunan->random()->id,
            'pendidikan_id'          => Label::whereLabel('pendidikan')          ->first()->turunan->random()->id,
            'pekerjaan_id'           => Label::whereLabel('pekerjaan')           ->first()->turunan->random()->id,
            'kewarganegaraan_id'     => Label::whereLabel('kewarganegaraan')     ->first()->turunan->random()->id,
            'ktp_el_id'              => Label::whereLabel('ktp-el')              ->first()->turunan->random()->id,
            'status_rekam_id'        => Label::whereLabel('status-rekam')        ->first()->turunan->random()->id,
            'tempat_dilahirkan_id'   => Label::whereLabel('tempat-dilahirkan')   ->first()->turunan->random()->id,
            'penolong_kelahiran_id'  => Label::whereLabel('penolong-kelahiran')  ->first()->turunan->random()->id,
            'jenis_kelahiran_id'     => Label::whereLabel('jenis-kelahiran')     ->first()->turunan->random()->id,
            'cacat_id'               => Label::whereLabel('cacat')               ->first()->turunan->random()->id,
            'sakit_menahun_id'       => Label::whereLabel('sakit-menahun')       ->first()->turunan->random()->id,
            'cara_kb_id'             => Label::whereLabel('cara-kb')             ->first()->turunan->random()->id,
        ];
    }
}
