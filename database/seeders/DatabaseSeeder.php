<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 50; $i++) { 
            
            DB::table('posts')->insert([
                
                'title' => $faker->jobTitle,
                //'age' => $faker->numberBetween(17, 40),
                'body' => $faker->address,
                //'created_at' => Carbon::now(),
                'created_at' => date("Y-m-d H:i:s") 
            ]);

        }
    }
}
