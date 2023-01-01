<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biodata>
 */
class BiodataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nisn' => fake()->numerify('########'),
            'nama' => fake()->name(),
            'jk' => 'laki-laki',
            'asal_sekolah' => 'SMP Darma Bakti',
            'email' => fake()->safeEmail(),
            'nomor_hp' => fake()->phoneNumber(),
            'nomor_hp_ayah' => fake()->phoneNumber(),
            'nomor_hp_ibu' => fake()->phoneNumber(),
            'no_seleksi' => fake()->numerify('###'),
            'user_id' => 2,
        ];
    }
}
