<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('Admin#123'),
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Ryan Febrian',
            'username' => 'Ryfe22',
            'password' => Hash::make('RyanFebrian220203'),
            'role' => 'Member'
        ]);

        DB::table('users')->insert([
            'name' => 'Alvin Junio',
            'username' => 'Alvin19',
            'password' => Hash::make('AlvinJunio1991'),
            'role' => 'Member'
        ]);

        DB::table('users')->insert([
            'name' => 'Derian Ardenichson',
            'username' => 'Wainini',
            'password' => Hash::make('WaApaTuh'),
            'role' => 'Member'
        ]);

        DB::table('users')->insert([
            'name' => 'Vincensius Ivank',
            'username' => 'Cyber Scout',
            'password' => Hash::make('FBISENDHELP'),
            'role' => 'Member'
        ]);

        DB::table('users')->insert([
            'name' => 'Andrew Putra',
            'username' => 'AP 2000',
            'password' => Hash::make('AndrewPutraGanteng'),
            'role' => 'Member'
        ]);
    }
}
