<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                "name" => "tes",
                "email" => 'tes@gmail.com',
                "password" => bcrypt('123')
            ]
            ];

        \App\Models\User::insert($data);
    }
}
