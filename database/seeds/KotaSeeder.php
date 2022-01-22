<?php

use Illuminate\Database\Seeder;
use App\Models\Kota;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kota::insert([
        	[
        		'nama'		 => 'Depok',
        		'keterangan' => 'Ini kota Depok'
        	],        	
        	[
        		'nama'		 => 'Bekasi',
        		'keterangan' => 'Ini kota Bekasi'
        	],
        	[
        		'nama'		 => 'Jakarta',
        		'keterangan' => 'Ini kota Jakarta'
        	]
        ]);
    }
}
