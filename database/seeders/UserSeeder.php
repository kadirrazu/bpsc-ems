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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Md. Abdul Kadir',
            'username' => 'kadirrazu',
            'email' => 'kadir.bpsc@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'status' => 1,
        ]);

        DB::table('roles')->insert([
            ['title' => 'Super Admin'],
            ['title' => 'Admin'],
            ['title' => 'Chairman'],
            ['title' => 'Member'],
            ['title' => 'Report Generator'],
        ]);
    }
}
