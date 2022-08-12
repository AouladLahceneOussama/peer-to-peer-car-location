<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;


class feedbackClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,20) as $value){
            DB::table('feedback_clients')->insert([
                'partner_id' => $faker->passthrough(mt_rand(1, 5)),
                'client_id' => $faker->passthrough(mt_rand(1, 5)),
                'comment' => $faker->paragraph,
                'nb_stars' => $faker->passthrough(mt_rand(1, 5)),
                'created_at' => $faker->dateTime,
            ]);
        }
    }
}
