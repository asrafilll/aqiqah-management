<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
        		'name' 			 => 'Admin John Doe',
                'username'       => 'admin',
        		'email'			 => 'admin@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 1,
        		'kota_cabang_id' => null
        	],
        	[
        		'name' 			 => 'Kepala Cabang Billy',
                'username'       => 'kepala',
        		'email'			 => 'kepala@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 2,
        		'kota_cabang_id' => null
        	],
        	[
        		'name' 			 => 'Kaptain Dapur Rizky',
                'username'       => 'kaptain',
        		'email'			 => 'kaptain@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 3,
        		'kota_cabang_id' => 1
        	],
            [
                'name'           => 'CS Rifky',
                'username'       => 'cs',
                'email'          => 'cs@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 4,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'Crew Aditya',
                'username'       => 'crew',
                'email'          => 'crew@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 5,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'Direktur Teddy',
                'username'       => 'direktur',
                'email'          => 'direktur@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 6,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'Manager Rifai',
                'username'       => 'manager',
                'email'          => 'manager@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 7,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'PPIC Pambudi',
                'username'       => 'ppic',
                'email'          => 'ppic@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 8,
                'kota_cabang_id' => 1
            ]
        ]);
    }
}
