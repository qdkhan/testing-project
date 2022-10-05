<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<40; $i++){
            DB::table('post_tag')->insert([
                'post_id' => $faker->numberBetween($min=1,$max=20),
                'tag_id'  => $faker->numberBetween($min=1,$max=4),
            ]);
        }
    }
}
