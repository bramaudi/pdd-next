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
        Role::create(['name' => 'Super Admin']);

        /**
         * Operator
         */
        $operator = Role::create(['name' => 'Operator']);


        /** CRUD Pengguna */
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.read']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.delete']);

        $operator->givePermissionTo([
            'user.create',
            'user.read',
            'user.update',
            'user.delete'
        ]);
    }
}
