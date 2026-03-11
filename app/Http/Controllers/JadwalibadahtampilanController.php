<?php

namespace App\Http\Controllers;
use App\Models\Jadwalibadah;
use Illuminate\Http\Request;

class JadwalibadahtampilanController extends Controller
{
    public function index()
    {
        $dataJadwalibadah = Jadwalibadah::latest()->get();
        return view('tampilan.jadwalibadah', compact('dataJadwalibadah'));
    }

    public function show($id)
    {
        $jadwal = Jadwalibadah::findOrFail($id);
        return view('jadwalibadah.detailjadwal', compact('jadwal'));
    }
}