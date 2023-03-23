<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // News::create([
        //     'title' => fake()->sentence(),
        //     'slug' => uniqid() . '-berita-1',
        //     'kategory' => 'event',
        //     'date' => '2022-02-22',
        //     'image' => null,
        //     'content' => fake()->paragraph(rand(5, 10)),
        //     'views' => 15,
        // ]);
        // News::create([
        //     'title' => fake()->sentence(),
        //     'slug' => uniqid() . '-berita-2',
        //     'kategory' => 'event',
        //     'date' => '2022-04-04',
        //     'image' => null,
        //     'content' => fake()->paragraph(rand(5, 10)),
        //     'views' => 123,
        // ]);
        // News::create([
        //     'title' => fake()->sentence(),
        //     'slug' => uniqid() . '-berita-3',
        //     'kategory' => 'event',
        //     'date' => '2022-10-01',
        //     'image' => null,
        //     'content' => fake()->paragraph(rand(5, 10)),
        //     'views' => 11,
        // ]);
        // News::create([
        //     'title' => fake()->sentence(),
        //     'slug' => uniqid() . '-berita-4',
        //     'kategory' => 'event',
        //     'date' => '2022-02-10',
        //     'image' => null,
        //     'content' => fake()->paragraph(rand(5, 10)),
        //     'views' => 12,
        // ]);

        // News::create([
        //     'title' => fake()->sentence(),
        //     'slug' => uniqid() . fake()->sentence(),
        //     'kategory' => 'informasi',
        //     'date' => '2022-02-10',
        //     'image' => null,
        //     'content' => fake()->paragraph(rand(5, 10)),
        //     'views' => 888,
        // ]);

        $kategory = ['berita', 'pengumuman', 'agenda', 'greenmetric', 'jadwal_ujian', 'seminar', 'kuliah_umum', 'kegiatan_mahasiswa', 'ekstrakulikuler', 'kegiatan_kampus', 'jurnal', 'sda'];
        for ($i = 0; $i < 100; $i++) {
            News::create([
                'title' => fake()->sentence(),
                'slug' => uniqid() . fake()->sentence(),
                'kategory' => $kategory[rand(0, 11)],
                'date' => fake()->date(),
                'image' => null,
                'content' => fake()->paragraph(rand(5, 10)),
                'views' => rand(0, 1000),
            ]);
        }
    }
}
