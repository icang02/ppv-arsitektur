<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Direktur;

class DirekturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direktur::Create([
            'name' => 'Dr. Eng. Sudarsono, ST., M.Eng',
            'position' => 'Direktur',
            'image' => 'https://ppv.uho.ac.id/gbr_pimpinan/Direktur.jpg',
        ]);
        Direktur::Create([
            'name' => 'Dr. Try Sugiyarto S, S.T., M.T',
            'position' => 'Wakil Direktur I',
            'image' => 'https://ppv.uho.ac.id/gbr_pimpinan/Direktur.jpg',
        ]);
        Direktur::Create([
            'name' => 'Uniadi Mangidi, ST., MT',
            'position' => 'Wakil Direktur II',
            'image' => 'https://ppv.uho.ac.id/gbr_pimpinan/Direktur.jpg',
        ]);
        Direktur::Create([
            'name' => 'La Hasanuddin, ST., MT',
            'position' => 'Wakil Direktur III',
            'image' => 'https://ppv.uho.ac.id/gbr_pimpinan/Direktur.jpg',
        ]);
    }
}
