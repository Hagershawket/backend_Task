<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        // User::truncate();

        User::create([
            'name'      =>  'Hager Shawkat',
            'email'     =>  'Hagershawkat@gmail.com',
            'password'  =>   Hash::make('123456789'),

        ]);

        User::create([
            'name'      =>  'Ahmed Mohamed',
            'email'     =>  'Ahmedmohamed@gmail.com',
            'password'  =>   Hash::make('123456789'),

        ]);
    }
}
