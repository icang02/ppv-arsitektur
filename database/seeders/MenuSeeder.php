<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::Create([
            'title' => 'Sejarah',
            'slug' => 'sejarah',
            'kategory' => 'profil',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Visi Misi',
            'slug' => 'visi-misi',
            'kategory' => 'profil',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Tujuan',
            'slug' => 'tujuan',
            'kategory' => 'profil',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Sasaran Strategis',
            'slug' => 'sasaran-strategis',
            'kategory' => 'profil',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Akreditasi',
            'slug' => 'akreditasi',
            'kategory' => 'dokumen',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Dokumen Rahasia',
            'slug' => 'dokumen-rahasia',
            'kategory' => 'dokumen',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Dokumen Palsu',
            'slug' => 'dokumen-palsu',
            'kategory' => 'dokumen',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Kalender Akademik',
            'slug' => 'kalender-akademik',
            'kategory' => 'akademik',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Jadwal Perkuliahan',
            'slug' => 'jadwal-perkuliahan',
            'kategory' => 'akademik',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);
        Menu::Create([
            'title' => 'Jadwal Ujian',
            'slug' => 'jadwal-ujian',
            'kategory' => 'akademik',
            'image' => null,
            'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'
        ]);

        Menu::Create([
            'title' => 'Survei Visi & Misi PPV',
            'slug' => str()->slug('Survei Visi & Misi PPV'),
            'kategory' => 'survei',
            'image' => null,
            'content' => 'Link FORM'
        ]);
        Menu::Create([
            'title' => 'Survei Kepuasan Pengguna PPV',
            'slug' => str()->slug('Survei Kepuasan Pengguna PPV'),
            'kategory' => 'survei',
            'image' => null,
            'content' => 'Link FORM'
        ]);
    }
}
