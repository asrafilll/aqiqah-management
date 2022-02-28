<?php

namespace App\Models\Paket;

use Illuminate\Database\Eloquent\Model;

class MenuPilihan extends Model
{
    public function pilihanPaket(){
    	return $this->hasMany(PaketMenuPilihan::class, 'menu_pilihan_id', 'id');
    }

    public function olahanAyam(){
    	return $this->hasMany(OlahanAyam::class, 'menu_pilihan_id', 'id');
    }

    public function olahanTelur(){
    	return $this->hasMany(OlahanTelur::class, 'menu_pilihan_id', 'id');
    }
}
