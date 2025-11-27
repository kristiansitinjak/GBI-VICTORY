<?php

namespace App\Http\Controllers;
use App\Models\Jadwalibadah;
use Illuminate\Http\Request;

class JadwalibadahtampilanController extends Controller
{
    public function index()
    {
        $dataJadwalibadah = Jadwalibadah::all();
        return view('tampilan.jadwalibadah', compact('dataJadwalibadah'));

    }
}
