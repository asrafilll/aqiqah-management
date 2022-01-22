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
        		'name' 			 => 'Cabang Depok Rizky',
        		'email'			 => 'cabang_depok@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 3,
        		'kota_cabang_id' => 1
        	],
        	[
        		'name' 			 => 'Cabang Bekasi Ilham',
        		'email'			 => 'cabang_bekasi@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 3,
        		'kota_cabang_id' => 2
        	],
        	[
        		'name' 			 => 'Cabang Jakarta Rizky',
        		'email'			 => 'cabang_jakarta@mail.com',
        		'password' 		 => \Hash::make(123123),
        		'role_id'		 => 3,
        		'kota_cabang_id' => 3
        	]
        ]);
    }
}
