<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 4; $i++) {
            $title = fake()->sentence();
            Prestasi::create([
                'title' => $title,
                'slug' => uniqid() . '-' . str()->slug($title),
                'date' => fake()->date(),
                'image' => null,
                'content' => fake()->paragraph(rand(5, 10)),
                'views' => rand(0, 1000),
            ]);
        }
    }
}
