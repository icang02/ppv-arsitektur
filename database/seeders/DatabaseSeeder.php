<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sliders;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => "Administrator",
      'jenis_user' => 1,
      'email' => 'admin@gmail.com',
      'password' => Hash::make('admin'),
    ]);
    User::create([
      'name' => "User",
      'jenis_user' => 2,
      'email' => 'user@gmail.com',
      'password' => Hash::make('user'),
    ]);

    $this->call([
      MenuSeeder::class,
      NewsSeeder::class,
      DirekturSeeder::class,
      VisimisiSeeder::class,
      LinkSeeder::class,
      PrestasiSeeder::class,
      FotoPrestasiSeeder::class,
      FasilitasSeeder::class,
      DosenSeeder::class,
      PenelitianSeeder::class,
    ]);
  }
}
