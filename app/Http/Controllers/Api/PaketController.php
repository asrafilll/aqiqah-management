<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paket\JenisPaket;

class PaketController extends Controller
{
    public function getDynamicPaket()
    {
        $jenis_paket = JenisPaket::all();
        return view('ajax_page.dynamic_paket', compact('jenis_paket'));
    }
}
