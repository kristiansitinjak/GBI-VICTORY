<?php

namespace App\Http\Controllers;
use App\Models\Warta;
use Illuminate\Http\Request;

class WartatampilanController extends Controller
{
    public function index()
    {
        $dataWarta = Warta::latest()->get();
        return view('tampilan.warta', compact('dataWarta'));
    }

    public function show($id)
    {
        $warta = Warta::findOrFail($id);
        return view('warta.detailwarta', compact('warta'));
    }
    public function dashboard(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        
        $donasi = \App\Models\Donasi::whereYear('tanggal', $tahun)->sum('jumlahdonasi');
        
        $charts_donasi = [];
        for ($i = 1; $i <= 12; $i++) {
            $charts_donasi[] = \App\Models\Donasi::whereYear('tanggal', $tahun)
                                ->whereMonth('tanggal', $i)
                                ->sum('jumlahdonasi');
        }

        $no_donations = $donasi == 0;

        return view('admin.dashboard', compact('tahun', 'donasi', 'charts_donasi', 'no_donations'));
    }
}