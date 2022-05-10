<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => '2D',
        ]);

        DB::table('tags')->insert([
            'name' => '3D',
        ]);

        DB::table('tags')->insert([
            'name' => 'Anime',
        ]);

        DB::table('tags')->insert([
            'name' => 'Game',
        ]);

        DB::table('tags')->insert([
            'name' => 'Tech',
        ]);
    }
}
