<?php

use Illuminate\Database\Seeder;
use App\Models\Paket\{
	Paket,
	JenisPaket,
	MenuPilihan,
	PaketNasi,
	PaketMenuPilihan,
	Nasi,
	OlahanDaging,
	OlahanJeroan
};


class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$paketKambingMasak = JenisPaket::create([
    		'nama' 			   => 'Paket Kambing Masak',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => true,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketNasiBoxHemat = JenisPaket::create([
    		'nama' 			   => 'Paket Nasi Box Hemat',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => true,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketNasiBoxPraktis = JenisPaket::create([
    		'nama' 			   => 'Paket Nasi Box Praktis',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => true,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketNasiBoxSpecial = JenisPaket::create([
    		'nama' 			   => 'Paket Nasi Box Special',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => true,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketNasiBoxArab = JenisPaket::create([
    		'nama' 			   => 'Paket Nasi Box Arab',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => true,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketEkonomisMewah = JenisPaket::create([
    		'nama' 			   => 'Paket Ekonomis Mewah(Bento)',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => false,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketEkonomisManis = JenisPaket::create([
    		'nama' 			   => 'Paket Ekonomis Manis(Bento)',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => false,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$paketAqiqahTumpeng = JenisPaket::create([
    		'nama' 			   => 'Paket Aqiqah Tumpeng',
    		'is_olahan_daging' => true,
    		'is_olahan_jeroan' => true,
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	OlahanDaging::insert([
    		[
    			'nama' 		 => 'Semur',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		],
    		[
    			'nama' 		 => 'Rendang',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		],
    		[
    			'nama' 		 => 'Teriyaki',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		],
    		[
    			'nama' 		 => 'BBQ',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		]
    	]);

    	OlahanJeroan::insert([
    		[
    			'nama' 		 => 'Gule',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		],
    		[
    			'nama' 		 => 'Tongseng',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		],
    		[
    			'nama' 		 => 'Sop',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		],
    		[
    			'nama' 		 => 'Empal Gentong',
    			'is_utama'   => true,
    			'created_by' => 1,
    			'updated_by' => 1
    		]
    	]);

    	$olahanTelur = MenuPilihan::create([
    		'nama' 		 	 => 'Olahan Telur',
    		'created_by' 	 => 1,
    		'updated_by' 	 => 1
    	]);

    	$olahanAyam = MenuPilihan::create([
    		'nama' 		 	 => 'Olahan Ayam',
    		'created_by' 	 => 1,
    		'updated_by' 	 => 1
    	]);

    	$mixVegetable = MenuPilihan::create([
    		'nama' 		 	 => 'Mix Vegetable',
    		'created_by' 	 => 1,
    		'updated_by' 	 => 1
    	]);

    	PaketMenuPilihan::insert([
    		[
    			'urutan_menu' 	  => 1,
    			'menu_pilihan_id' => $olahanTelur->id,
    			'jenis_paket_id'  => $paketNasiBoxPraktis->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		],
    		[
    			'urutan_menu' 	  => 2,
    			'menu_pilihan_id' => $mixVegetable->id,
    			'jenis_paket_id'  => $paketNasiBoxPraktis->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		],
    		[
    			'urutan_menu' 	  => 1,
    			'menu_pilihan_id' => $olahanAyam->id,
    			'jenis_paket_id'  => $paketNasiBoxSpecial->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		],
    		[
    			'urutan_menu' 	  => 1,
    			'menu_pilihan_id' => $mixVegetable->id,
    			'jenis_paket_id'  => $paketNasiBoxSpecial->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		],
    		[
    			'urutan_menu' 	  => 2,
    			'menu_pilihan_id' => $mixVegetable->id,
    			'jenis_paket_id'  => $paketEkonomisMewah->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		],
    		[
    			'urutan_menu' 	  => 1,
    			'menu_pilihan_id' => $olahanAyam->id,
    			'jenis_paket_id'  => $paketEkonomisManis->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		],
    		[
    			'urutan_menu' 	  => 1,
    			'menu_pilihan_id' => $olahanTelur->id,
    			'jenis_paket_id'  => $paketAqiqahTumpeng->id,
    			'created_by' 	  => 1,
    			'updated_by' 	  => 1
    		]
    	]);

    	$nasiPutih = Nasi::create([
    		'nama' 			   => 'Nasi Putih',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$nasiMandhi = Nasi::create([
    		'nama' 			   => 'Nasi Mandhi',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$nasiKebuli = Nasi::create([
    		'nama' 			   => 'Nasi Kebuli',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$nasiBiryani = Nasi::create([
    		'nama' 			   => 'Nasi Biryani',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$nasiKabsah = Nasi::create([
    		'nama' 			   => 'Nasi Kabsah',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$nasiKuning = Nasi::create([
    		'nama' 			   => 'Nasi Kuning',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	$nasiUduk = Nasi::create([
    		'nama' 			   => 'Nasi Uduk',
    		'created_by' 	   => 1,
    		'updated_by' 	   => 1
    	]);

    	PaketNasi::insert([
    		[
    			'nasi_id'    	 => $nasiPutih->id,
    			'jenis_paket_id' => $paketNasiBoxHemat->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiPutih->id,
    			'jenis_paket_id' => $paketNasiBoxPraktis->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiPutih->id,
    			'jenis_paket_id' => $paketNasiBoxSpecial->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiPutih->id,
    			'jenis_paket_id' => $paketEkonomisMewah->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiPutih->id,
    			'jenis_paket_id' => $paketEkonomisManis->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiPutih->id,
    			'jenis_paket_id' => $paketAqiqahTumpeng->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiMandhi->id,
    			'jenis_paket_id' => $paketNasiBoxArab->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiMandhi->id,
    			'jenis_paket_id' => $paketAqiqahTumpeng->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiKebuli->id,
    			'jenis_paket_id' => $paketNasiBoxArab->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiKebuli->id,
    			'jenis_paket_id' => $paketAqiqahTumpeng->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiBiryani->id,
    			'jenis_paket_id' => $paketNasiBoxArab->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiBiryani->id,
    			'jenis_paket_id' => $paketAqiqahTumpeng->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiKabsah->id,
    			'jenis_paket_id' => $paketNasiBoxArab->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		],
    		[
    			'nasi_id'    	 => $nasiUduk->id,
    			'jenis_paket_id' => $paketAqiqahTumpeng->id,
    			'created_by' 	 => 1,
    			'updated_by' 	 => 1
    		]
    	]);
    }
}
