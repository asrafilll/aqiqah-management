<?php

use Illuminate\Database\Seeder;
use App\Models\Paket\{
	JenisPaket,
  JenisPaketNasi,
  Nasi,
  Olahan,
  OlahanKategori
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
        $olahanDaging = OlahanKategori::create([
            'nama'       => 'Olahan Daging',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $olahanJeroan = OlahanKategori::create([
            'nama'       => 'Olahan Jeroan',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $olahanTelur = OlahanKategori::create([
            'nama'       => 'Olahan Telur',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $olahanAyam = OlahanKategori::create([
            'nama'       => 'Olahan Ayam',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $mixVegetable = OlahanKategori::create([
            'nama'       => 'Mix Vegetable',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $paketKambingMasak = JenisPaket::create([
            'nama'             => 'Paket Kambing Masak',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => true,
            'menu_pilihan1'    => null,
            'menu_pilihan2'    => null,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketNasiBoxHemat = JenisPaket::create([
            'nama'             => 'Paket Nasi Box Hemat',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => true,
            'menu_pilihan1'    => null,
            'menu_pilihan2'    => null,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketNasiBoxPraktis = JenisPaket::create([
            'nama'             => 'Paket Nasi Box Praktis',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => true,
            'menu_pilihan1'    => $olahanTelur->id,
            'menu_pilihan2'    => $mixVegetable->id,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketNasiBoxSpecial = JenisPaket::create([
            'nama'             => 'Paket Nasi Box Special',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => true,
            'menu_pilihan1'    => $olahanAyam->id,
            'menu_pilihan2'    => $mixVegetable->id,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketNasiBoxArab = JenisPaket::create([
            'nama'             => 'Paket Nasi Box Arab',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => true,
            'menu_pilihan1'    => null,
            'menu_pilihan2'    => null,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketEkonomisMewah = JenisPaket::create([
            'nama'             => 'Paket Ekonomis Mewah(Bento)',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => false,
            'menu_pilihan1'    => null,
            'menu_pilihan2'    => $mixVegetable->id,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketEkonomisManis = JenisPaket::create([
            'nama'             => 'Paket Ekonomis Manis(Bento)',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => false,
            'menu_pilihan1'    => $olahanAyam->id,
            'menu_pilihan2'    => null,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);

        $paketAqiqahTumpeng = JenisPaket::create([
            'nama'             => 'Paket Aqiqah Tumpeng',
            'is_olahan_daging' => true,
            'is_olahan_jeroan' => true,
            'menu_pilihan1'    => $olahanTelur->id,
            'menu_pilihan2'    => $mixVegetable->id,
            'created_by'       => 1,
            'updated_by'       => 1
        ]);
        

        Olahan::insert([
            [
                'nama' 		         => 'Semur',
                'olahan_kategori_id' => $olahanDaging->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama' 		         => 'Rendang',
                'olahan_kategori_id' => $olahanDaging->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama' 		         => 'Teriyaki',
                'olahan_kategori_id' => $olahanDaging->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama' 		         => 'BBQ',
                'olahan_kategori_id' => $olahanDaging->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Gule',
                'olahan_kategori_id' => $olahanJeroan->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Tongseng',
                'olahan_kategori_id' => $olahanJeroan->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Sop',
                'olahan_kategori_id' => $olahanJeroan->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Empal Gentong',
                'olahan_kategori_id' => $olahanJeroan->id,
                'is_utama'           => true,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Telur Balado',
                'olahan_kategori_id' => $olahanTelur->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Telur Rebus',
                'olahan_kategori_id' => $olahanTelur->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Ayam Goreng',
                'olahan_kategori_id' => $olahanAyam->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Ayam Bakar',
                'olahan_kategori_id' => $olahanAyam->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Mix Vegetable',
                'olahan_kategori_id' => $mixVegetable->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Kentang Ati',
                'olahan_kategori_id' => $mixVegetable->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Oreg Tempe',
                'olahan_kategori_id' => $mixVegetable->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ],
            [
                'nama'               => 'Saos',
                'olahan_kategori_id' => $mixVegetable->id,
                'is_utama'           => 1,
                'created_by'         => 1,
                'updated_by'         => 1
            ]
        ]);

        $nasiPutih = Nasi::create([
            'nama' 		 => 'Nasi Putih',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $nasiMandhi = Nasi::create([
            'nama' 		 => 'Nasi Mandhi',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $nasiKebuli = Nasi::create([
            'nama' 		 => 'Nasi Kebuli',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $nasiBiryani = Nasi::create([
            'nama' 		 => 'Nasi Biryani',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $nasiKabsah = Nasi::create([
            'nama' 		 => 'Nasi Kabsah',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $nasiKuning = Nasi::create([
            'nama' 		 => 'Nasi Kuning',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        $nasiUduk = Nasi::create([
            'nama' 		 => 'Nasi Uduk',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        JenisPaketNasi::insert([
            [
                'nasi_id'    	 => $nasiPutih->id,
                'jenis_paket_id' => $paketNasiBoxHemat->id,
                'created_by' 	 => 1,
                'updated_by' 	 => 1
            ],
            [
               'nasi_id'    	 => $nasiPutih->id,
               'jenis_paket_id'  => $paketNasiBoxPraktis->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiPutih->id,
               'jenis_paket_id'  => $paketNasiBoxSpecial->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiPutih->id,
               'jenis_paket_id'  => $paketEkonomisMewah->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiPutih->id,
               'jenis_paket_id'  => $paketEkonomisManis->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiPutih->id,
               'jenis_paket_id'  => $paketAqiqahTumpeng->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiMandhi->id,
               'jenis_paket_id'  => $paketNasiBoxArab->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiMandhi->id,
               'jenis_paket_id'  => $paketAqiqahTumpeng->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiKebuli->id,
               'jenis_paket_id'  => $paketNasiBoxArab->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiKebuli->id,
               'jenis_paket_id'  => $paketAqiqahTumpeng->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiBiryani->id,
               'jenis_paket_id'  => $paketNasiBoxArab->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiBiryani->id,
               'jenis_paket_id'  => $paketAqiqahTumpeng->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiKabsah->id,
               'jenis_paket_id'  => $paketNasiBoxArab->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ],
           [
               'nasi_id'    	 => $nasiUduk->id,
               'jenis_paket_id'  => $paketAqiqahTumpeng->id,
               'created_by' 	 => 1,
               'updated_by' 	 => 1
           ]
       ]);
    }
}
