<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class feedbackArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,50) as $value){
            DB::table('feedback_articles')->insert([
                'annonce_id' => $faker->passthrough(mt_rand(1, 20)),
                'user_id' => $faker->passthrough(mt_rand(1, 5)),
                'comment' => $faker->text($maxNbChars = 200),
                'nb_stars' => $faker->passthrough(mt_rand(1, 5)),
                'created_at' => $faker->dateTime,
            ]);
        }
    }
}
