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
        DB::table('testings')->insert([
            'name'      => 'Ayan Khan',
            'address'   => 'Mumbai',
            'dob'       => '2017-06-02',
            'movies'    => '["F","G","H","I"]',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
    }
}
