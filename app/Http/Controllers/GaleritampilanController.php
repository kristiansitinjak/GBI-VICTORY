<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleritampilanController extends Controller
{
    public function index()
    {
        $dataGaleri = Galeri::all();
        return view('tampilan.galeri', compact('dataGaleri'));

    }
}   