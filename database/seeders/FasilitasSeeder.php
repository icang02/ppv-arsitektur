<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fasilitas::create([
            'nama' => 'Laboratorium Software Engineering',
            'kepala' => 'Ilmi Faizan, S.T.',
            'is_lab' => 1,
            'foto' => 'foto.jpg',
        ]);
    }
}
