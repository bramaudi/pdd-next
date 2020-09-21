<?php

namespace Database\Seeders\Sistem;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class JabatanAksesSeeder extends Seeder
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
     * Beri hak akses untuk Operator
     */
    public function roleOperator()
    {
        $operator = Role::where('name', 'Operator')->first();
        $operator->givePermissionTo([
            'user.create',
            'user.read',
            'user.update',
            'user.delete'
        ]);
        $operator->givePermissionTo('config.update');
    }
}
