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
            'position' => 'Koordinator Program Studi',
            'image' => 'https://ppv.uho.ac.id/gbr_pimpinan/Direktur.jpg',
        ]);
    }
}
