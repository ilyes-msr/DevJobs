<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//      \App\Models\User::factory(5)->create();
      $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'jdoe@gmail.test'
      ]);

      Listing::factory(6)->create([
        'user_id' => $user->id
      ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
