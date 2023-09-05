<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Putra operator',
                'email' => 'operator@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 'operator'
            ],
            [
                'name' => 'Putra marketing',
                'email' => 'marketing@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 'marketing'
            ],
            [
                'name' => 'Putra keuangan',
                'email' => 'keuangan@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 'keuangan'
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
