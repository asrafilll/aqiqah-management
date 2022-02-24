<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paket\{
	OlahanDaging,
	OlahanJeroan,
	PaketMenuPilihan,
    MenuPilihan,
    Nasi
};

class OlahanController extends Controller
{
    public function getOlahanDaging()
    {
        return OlahanDaging::where('is_utama', true)->latest()->get();
    }

    public function getOlahanJeroan()
    {
        return OlahanJeroan::where('is_utama', true)->latest()->get();
    }

    public function getMenuPilihan(Request $request)
    {
        return MenuPilihan::with('pilihanPaket')
        ->when($request->urutan_menu, function($q)use($request){
            $q->whereHas('pilihanPaket', function($q2)use($request){
                $q2->where('urutan_menu', $request->urutan_menu);
            });
        })
        ->when($request->jenis_paket_id, function($q)use($request){
            $q->whereHas('pilihanPaket', function($q2)use($request){
                $q2->where('jenis_paket_id', $request->jenis_paket_id);
            });
        })
        ->latest()->get();
    }

    public function getNasi()
    {
        return Nasi::latest()->get();
    }
}
