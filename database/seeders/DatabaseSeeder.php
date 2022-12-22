<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Muhammad Yazid Akbar',
            'email' => 'yazzhanz@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);
    }
}
