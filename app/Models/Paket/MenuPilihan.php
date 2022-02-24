<?php

namespace App\Models\Paket;

use Illuminate\Database\Eloquent\Model;

class MenuPilihan extends Model
{
    public function pilihanPaket(){
    	return $this->hasMany(PaketMenuPilihan::class, 'menu_pilihan_id', 'id');
    }
}
