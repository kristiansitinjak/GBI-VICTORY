<?php

namespace App\Http\Controllers;
use App\Models\Warta;
use App\Models\Donasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('tampilan.home');
    }


    public function layanan()
    {
        return view('tampilan.layanan');
    }

    public function lokasi()
    {
        return view('tampilan.lokasi');
    }

    public function profile()
    {
        return view('tampilan.profile');
    }

    public function warta()
    {
        $dataWarta = Warta::all();
        return view('tampilan.warta');
    }
    
    public function wisma()
    {
        return view('layanan.wisma');
    }

    public function donasi()
    {
        return view('tampilan.donasi');
    }

}








