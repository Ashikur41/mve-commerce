<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
            //Admin
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin@123'),
            'role'=>'admin',
            'status'=>'active',
            ],

            [
            //Vendor
            'name'=>'vendor',
            'username'=>'vendor',
            'email'=>'vendor@gmail.com',
            'password'=>Hash::make('vendor@123'),
            'role'=>'vendor',
            'status'=>'active',
            ],

            [
            //User
            'name'=>'user',
            'username'=>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user@123'),
            'role'=>'user',
            'status'=>'active',
            ]

        ]);
    }
}
