<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	[
        		'nama'		 => 'Admin',
        		'keterangan' => 'Ini role Admin'
        	],        	
        	[
        		'nama'		 => 'Kepala Cabang',
        		'keterangan' => 'Ini role Kepala Cabang'
        	],
        	[
        		'nama'		 => 'Cabang',
        		'keterangan' => 'Ini role Cabang'
        	]
        ]);
    }
}
