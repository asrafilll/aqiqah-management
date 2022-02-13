<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function create()
    {
    	$data['source'] = ['IG', 'FB', 'Google adds', 'offline'];
    	$data['grup']   = ['Jabodetabek', 'Jawa Barat', 'Banten'];
    	$data['masak_cabang']   = ['Depok', 'Jakarta', 'Bekasi Kota', 'Kabupaten Bekasi', 'Tangerang Kota', 'Kapubaten Tangerang', 'Bogor', 'Karawang', 'Sukabumi'];
        return view('order.create')->with($data);
    }
}
