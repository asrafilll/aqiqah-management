<?php

namespace App\Http\Controllers\KepalaCabang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('kepala_cabang.index');
    }
}
