<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all();
        $total     = $kegiatans->count();
        $hariList  = $kegiatans->pluck('hari')->unique()->count();

        return view('home', compact('kegiatans', 'total', 'hariList'));
    }
}
