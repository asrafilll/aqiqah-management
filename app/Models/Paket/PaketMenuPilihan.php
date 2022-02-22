<?php

namespace App\Models\Paket;

use Illuminate\Database\Eloquent\Model;

class PaketMenuPilihan extends Model
{
    public function menuPilihan(){
    	return $this->hasOne(MenuPilihan::class, 'id', 'menu_pilihan_id');
    }
}
