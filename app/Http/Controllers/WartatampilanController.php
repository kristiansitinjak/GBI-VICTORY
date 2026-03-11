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
}