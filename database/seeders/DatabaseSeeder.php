<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(LabelSeeder::class);
        $this->call(IndonesiaSeeder::class);
        $this->call(MetaSeeder::class);

        $this->call(FactorySeeder::class); // Untuk dummy,
    }
}
