<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 galeri terbaru berdasarkan created_at
        $dataGaleri = Galeri::latest()->take(6)->get();
        
        return view('tampilan.home', compact('dataGaleri'));
    }
}