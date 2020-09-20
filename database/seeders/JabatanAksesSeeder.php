<?php

namespace Database\Seeders;

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
