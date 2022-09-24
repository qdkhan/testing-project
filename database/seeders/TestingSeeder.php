<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // DB::table('testings')->insert([
        //     'name'      => 'Ayan Khan',
        //     'address'   => 'Mumbai',
        //     'dob'       => '2017-06-02',
        //     'movies'    => '["F","G","H","I"]',
        //     'created_at'=> date('Y-m-d H:i:s')
        // ]);
        for($i=0; $i<5; $i++){
                DB::table('testings')->insert([
                    'name'      => $faker->name(),
                    'address'   => $faker->city(),
                    'dob'       => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'movies'    => '["FF","GG","HH","II"]',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]);
        }
    }
}
