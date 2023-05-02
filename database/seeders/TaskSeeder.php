<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) { 
            DB::table('tasks')->insert([
                'title' => $faker->address,
                'body' => Str::random(10),
                'created_at' => now(),
            
                'user_id' => $faker->numberBetween(1, 2),
            ]);
        }
    }
}
