<?php

namespace Database\Seeders\Sistem;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class JabatanOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->roleOperator();
    }

    /**
     * Buat dan beri hak akses untuk jabatan Operator
     */
    public function roleOperator()
    {
        $operator = Role::where('name', 'Operator')->first();

        /**
         * Desa
         */
        $operator->givePermissionTo('desa_identitas');
        $operator->givePermissionTo('desa_wilayah');

        /**
         * Kependudukan
         */
        $operator->givePermissionTo('kependudukan_penduduk');
        $operator->givePermissionTo('kependudukan_keluarga');

        /**
         * Sistem
         */
        $operator->givePermissionTo('sistem_pengguna');
        $operator->givePermissionTo('sistem_jabatan');
    }
}
