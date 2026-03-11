<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use App\Models\Warta;
use App\Models\Donasi;
use App\Models\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dataGaleri = Galeri::latest()->take(6)->get();
        $dataFaq    = Faq::all();

        return view('tampilan.home', compact('dataGaleri', 'dataFaq'));
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
        return view('tampilan.warta', compact('dataWarta'));
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