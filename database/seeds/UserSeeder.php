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
        		'email'			 => 'admin@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 1,
        		'kota_cabang_id' => null
        	],
        	[
        		'name' 			 => 'Kepala Cabang Billy',
        		'email'			 => 'kepala@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 2,
        		'kota_cabang_id' => null
        	],
        	[
        		'name' 			 => 'Kaptain Dapur Rizky',
        		'email'			 => 'kaptain@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 3,
        		'kota_cabang_id' => 1
        	],
            [
                'name'           => 'CS Rifky',
                'email'          => 'cs@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 4,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'Crew Aditya',
                'email'          => 'crew@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 5,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'Direktur Teddy',
                'email'          => 'direktur@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 6,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'Manager Rifai',
                'email'          => 'manager@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 7,
                'kota_cabang_id' => 1
            ],
            [
                'name'           => 'PPIC Pambudi',
                'email'          => 'ppic@mail.com',
                'password'       => \Hash::make(123123),
                'role_id'        => 8,
                'kota_cabang_id' => 1
            ]
        ]);
    }
}
