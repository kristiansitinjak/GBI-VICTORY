<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri; 

class FaqtampilanController extends Controller
{
    public function index()
    {
        // Ambil data FAQ (jika sudah ada sebelumnya)
        $dataFaq = \App\Models\Faq::all(); // atau query sesuai kebutuhanmu

        // Ambil hanya data galeri yang punya gambar (field 'gambar' tidak null/kosong)
        $dataGaleri = Galeri::whereNotNull('gambar')
                            ->where('gambar', '!=', '')
                            ->latest()
                            ->take(6)
                            ->get();

        return view('tampilan.home', compact('dataFaq', 'dataGaleri'));
    }
}