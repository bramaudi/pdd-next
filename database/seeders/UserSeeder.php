<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat akun super admin pertama
        $admin = User::create([
            'name' => "Admin",
            'username' => 'admin',
            'email' => 'admin@pdd.my.id',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        // Buat jabatan Super Admin dan pasang
        Role::create(['name' => 'Super Admin']);
        $admin->assignRole('Super Admin');

        // Dummy user jika mode pengembangan
        if (App::environment('local')) {
            User::factory()
                ->times(50)
                ->create();
        }
    }
}
