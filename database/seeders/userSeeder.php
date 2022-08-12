<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $value) {
            DB::table('users')->insert([
                'name' => $faker->unique()->username,
                'email' => $faker->unique()->email,
                'job' => $faker->jobTitle,
                'description' => $faker->text,
                'country' => $faker->country,
                'city' => $faker->city,
                'password' => hash::make("oussama123"),
                // 'profile_photo_path' => $faker->image(public_path('storage/profile-photos'), 640, 640, null, false),
                'profile_photo_path' => $faker->imageUrl(640, 640, 'people'),
                'created_at' => $faker->dateTime,
                'role' => $faker->passthrough(mt_rand(1, 2)),
            ]);
        }
    }
}
