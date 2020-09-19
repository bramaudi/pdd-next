<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Super Admin
         */
        Role::firstOrCreate(['name' => 'Super Admin']);

        /**
         * Operator
         */
        $operator = Role::firstOrCreate(['name' => 'Operator']);


        /** CRUD Pengguna */
        Permission::firstOrCreate(['name' => 'user.create']);
        Permission::firstOrCreate(['name' => 'user.read']);
        Permission::firstOrCreate(['name' => 'user.update']);
        Permission::firstOrCreate(['name' => 'user.delete']);

        $operator->givePermissionTo([
            'user.create',
            'user.read',
            'user.update',
            'user.delete'
        ]);


        /**
         * Ubah Identitas Desa
         */
        Permission::firstOrCreate(['name' => 'config.update']);

        $operator->givePermissionTo('config.update');
    }
}
