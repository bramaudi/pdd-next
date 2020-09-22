<?php

namespace Database\Seeders\Sistem;

use Database\Seeders\Sistem\HakAkses\Desa;
use Database\Seeders\Sistem\HakAkses\Kependudukan;
use Database\Seeders\Sistem\HakAkses\Sistem;
use Illuminate\Database\Seeder;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->call(Desa::class);
        $this->call(Kependudukan::class);
        $this->call(Sistem::class);

    }
}
