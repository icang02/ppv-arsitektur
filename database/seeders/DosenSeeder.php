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
                'foto' => 'https://images.unsplash.com/photo-1560193327-e52dafa295f4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fDMwMHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60',
            ]);
        }
    }
}
