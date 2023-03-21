<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visimisi;

class VisimisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visimisi::Create([
            'title' => 'Visi',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime saepe animi tempora, nemo dolorum explicabo? Tenetur consectetur consequuntur fuga enim, error corrupti illo cumque voluptas sapiente culpa labore, itaque excepturi necessitatibus voluptates adipisci doloribus fugit asperiores quo cum animi optio! Iure beatae ullam maiores dolorum, error incidunt et! Praesentium, maxime explicabo nihil provident, sequi quibusdam eveniet natus, reiciendis amet non deleniti eum! Temporibus eum libero ab numquam nulla doloribus aliquid corporis est quam velit ad beatae praesentium, deleniti ipsam mollitia inventore perspiciatis eius nihil laudantium quaerat reprehenderit illo similique rem maiores? Ducimus esse iste pariatur aliquam saepe explicabo earum? Qui.',
        ]);
        Visimisi::Create([
            'title' => 'Misi',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime saepe animi tempora, nemo dolorum explicabo? Tenetur consectetur consequuntur fuga enim, error corrupti illo cumque voluptas sapiente culpa labore, itaque excepturi necessitatibus voluptates adipisci doloribus fugit asperiores quo cum animi optio! Iure beatae ullam maiores dolorum, error incidunt et! Praesentium, maxime explicabo nihil provident, sequi quibusdam eveniet natus, reiciendis amet non deleniti eum! Temporibus eum libero ab numquam nulla doloribus aliquid corporis est quam velit ad beatae praesentium, deleniti ipsam mollitia inventore perspiciatis eius nihil laudantium quaerat reprehenderit illo similique rem maiores? Ducimus esse iste pariatur aliquam saepe explicabo earum? Qui.',
        ]);
    }
}
