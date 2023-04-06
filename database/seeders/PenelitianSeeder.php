<?php

namespace Database\Seeders;

use App\Models\Penelitian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenelitianSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    for ($i = 0; $i < 10; $i++) {
      Penelitian::create([
        'judul' => fake()->sentence(),
        'nama_dosen' => fake()->name(),
        'tahun' => rand(2020, 2023),
        'link' => '#',
      ]);
    }
  }
}
