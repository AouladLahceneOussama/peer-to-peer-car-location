<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

use Faker\Factory as Faker;

class annoncesSeeder extends Seeder
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
            DB::table('annonces')->insert([
                
                'user_id' => $faker->passthrough(mt_rand(1, 5)),
                'title'   => $faker->sentence,
                'description' => $faker->text,
                
                'price' => $faker->passthrough(mt_rand(100, 300)),
                'city' => $faker->city,
                'color' => $faker->hexColor,
                'car_model' => $faker->jobTitle,

                'stat' => 1,
                'created_at' => $faker->dateTime,
                'premium' => $faker->passthrough(mt_rand(0, 1)),
                'premium_duration' => $faker->passthrough(mt_rand(3, 360)),

                'image1' => '/storage/carsImages/'.$faker->passthrough(mt_rand(1, 4)).'.jpg',
                'image2' => '/storage/carsImages/'.$faker->passthrough(mt_rand(1, 4)).'.jpg',
                'image3' => '/storage/carsImages/'.$faker->passthrough(mt_rand(1, 4)).'.jpg',
            ]);
        }
    }
}
