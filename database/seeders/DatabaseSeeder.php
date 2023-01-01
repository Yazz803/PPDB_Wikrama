<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Biodata;
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

        \App\Models\User::create([
            'name' => 'Muhammad Yazid Akbar',
            'email' => 'yazzhanz@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'Sutaro Putra Pratama',
            'email' => 'sutaro@gmail.com',
            'password' => bcrypt('12108627'),
            'role' => 'user',
            'biodata_id' => 1
        ]);

        Biodata::create([
            'nisn' => '12108627',
            'nama' => 'Sutaro Putra Pratama',
            'jk' => 'laki-laki',
            'asal_sekolah' => 'SMP Darma Bakti',
            'email' => 'sutaro@gmail.com',
            'nomor_hp' => '081290215655',
            'nomor_hp_ayah' => '08129002231',
            'nomor_hp_ibu' => '08159023412',
            'no_seleksi' => '001',
            'user_id' => 2,
        ]);

        Biodata::factory(100)->create();

        User::factory(30)->create();
    }
}
