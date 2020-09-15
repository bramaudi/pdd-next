<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'nama' => 'Kalimandi',
            'email' => 'Pemdes.Kalimandi@gmail.com',
            'telepon' => '0286-5211024',
            'website' => 'https://www.kalimandi-banjarnegara.desa.id',

            'kode_desa' => '07',
            'kode_pos' => '53474',

            'kepala_desa_nama' => 'R. AGUNG NURSATRIJA, SH.',
            'kepala_desa_nip' => '19720822 199803 1 002',

            'kepala_camat_nama' => 'SONHAJI, S.IP, S.Sos, M. Kes',
            'kepala_camat_nip' => '19660626 198702 1 002',

            'kecamatan_nama' => 'Purwareja Klampok',
            'kecamatan_kode' => '02',

            'kabupaten_nama' => 'Banjarnegara',
            'kabupaten_kode' => '04',

            'provinsi_nama' => 'Jawa Tengah',
            'provinsi_kode' => '33',

            'map_lat' => '-7.456028455852898',
            'map_lng' => '109.45513218641281',
            'map_zoom' => '20',
            'map_tipe' => 'HYBIRD',
            'map_path' => '[[[-7.457407046978341,109.45343259382246],[-7.455066648746772,109.45349696683881],[-7.452853896401199,109.45330384778974],[-7.451715607725486,109.45450122213363],[-7.451853904638343,109.45638524198532],[-7.453396444168227,109.45850529623031],[-7.4555347141169594,109.45950955152512],[-7.457183627988169,109.4588271613121],[-7.4584070133280305,109.45720063352584],[-7.45816234417205,109.45497329092025]]]'
        ]);
    }
}
