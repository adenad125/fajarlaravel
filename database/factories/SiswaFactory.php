<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nisn' => fake()->unique()->regexify('[A-E]{1}[0-9]{9}'),
            'nama' => fake()->name(),
            'no_hp' => fake()->PhoneNumber(),
            'alamat' => fake()->address(),
            'foto' => fake()->regexify('[A-E]{1}[0-9]{9}') . '.jpg',
            'kelas_id' => mt_rand(1,12),

        ];
    }
}
