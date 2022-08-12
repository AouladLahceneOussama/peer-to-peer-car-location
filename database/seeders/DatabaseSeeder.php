<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            userSeeder::class,
            annoncesSeeder::class, 
            feedbackArticlesSeeder::class, 
            feedbackClientsSeeder::class,
            annoncedispoSeeder::class,
        ]);
    }
}
