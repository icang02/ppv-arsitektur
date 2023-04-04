<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i<23; $i++) {
            Dosen::create([
                'nama' => fake()->name(),
                'jabatan' => fake()->jobTitle(),
                'nidn' => fake()->numberBetween(100000000,999999999),
                'nip' => fake()->numberBetween(100000000000000000,999999999999999999),
                'pendidikan' => fake()->title(),
                'email' => fake()->email(),
                'foto' => 'https://img.freepik.com/premium-vector/people-profile-graphic_24911-21373.jpg',
            ]);
        }
    }
}
