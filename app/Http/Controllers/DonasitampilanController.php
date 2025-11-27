<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasitampilanController extends Controller
{
    public function index()
    {
        $allDonasi = Donasi::all()->groupBy('jenis');
        return view('tampilan.donasi', compact('allDonasi'));
    }
}
