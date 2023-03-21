<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            "name" => "Jurusan | D3 Teknik Mesin",
            "url" => 'https://bit.ly/monitoringperkuliahand3teknikmesin'
        ]);
        Link::create([
            "name" => "Jurusan | D3 Teknik Elektronika",
            "url" => "https://bit.ly/monitoringperkuliahand3teknikelektronika"
        ]);
        Link::create([
            "name" => "Jurusan | D3 Teknik Sipil",
            "url" => "https://bit.ly/monitoringperkuliahand3tekniksipil"
        ]);
        Link::create([
            "name" => "Jurusan | D3 Teknik Arsitektur",
            "url" => "https://bit.ly/monitoringperkuliahand3teknikarsitektur"
        ]);
        Link::create([
            "name" => "Jurusan | D3 Statistika",
            "url" => "https://bit.ly/monitoringperkuliahand3statistika"
        ]);
        Link::create([
            "name" => "Spada | Pembukaan Kelas Matakuliah",
            "url" => "#"
        ]);
        Link::create([
            "name" => "Spada | Registrasi Pembuatan Akun Spada",
            "url" => "#"
        ]);
        Link::create([
            "name" => "Spada | Reset Akun Spada",
            "url" => "#"
        ]);
        Link::create([
            "name" => "Spada | Panduan Penggunaan Spada",
            "url" => "#"
        ]);
        Link::create([
            "name" => "Slider | Siakad Beta UHO",
            "url" => "https://siakadbeta.uho.ac.id/"
        ]);
        Link::create([
            "name" => "Slider | E-Library UHO",
            "url" => "https://e-library.uho.ac.id/"
        ]);
        Link::create([
            "name" => "Slider | Spada UHO",
            "url" => "http://e-green.uho.ac.id/"
        ]);
    }
}
