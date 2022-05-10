<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->insert([
            'name' => 'Dummy 1',
            'picture' => 'dummy1.png',
            'user_id' => 2,
            'tag_id' => 1,
        ]);

        DB::table('pictures')->insert([
            'name' => 'Dummy 2',
            'picture' => 'dummy2.png',
            'user_id' => 3,
            'tag_id' => 2,
        ]);

        DB::table('pictures')->insert([
            'name' => 'Dummy 3',
            'picture' => 'dummy3.png',
            'user_id' => 4,
            'tag_id' => 3,
        ]);

        DB::table('pictures')->insert([
            'name' => 'Dummy 4',
            'picture' => 'dummy4.png',
            'user_id' => 5,
            'tag_id' => 4,
        ]);

        DB::table('pictures')->insert([
            'name' => 'Dummy 5',
            'picture' => 'dummy5.png',
            'user_id' => 6,
            'tag_id' => 5,
        ]);
    }
}
