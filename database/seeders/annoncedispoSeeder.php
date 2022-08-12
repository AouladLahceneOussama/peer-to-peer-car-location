<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class annoncedispoSeeder extends Seeder
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
            DB::table('annoncedispos')->insert([
                'annonce_id' => $faker->passthrough(mt_rand(1,20)),
                'day'   => $faker->dayOfWeek,
                'from' => $faker->time,
                'to' => $faker->time,
            ]);
        }
    }
}
