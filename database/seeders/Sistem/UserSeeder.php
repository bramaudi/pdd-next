<?php

namespace Database\Seeders\Sistem;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('Super Admin');

    }
}
