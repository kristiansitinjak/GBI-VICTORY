<?php

namespace App\Http\Controllers;
use App\Models\Warta;
use Illuminate\Http\Request;

class WartatampilanController extends Controller
{
    public function index()
    {
        $dataWarta = Warta::all();
        return view('tampilan.warta', compact('dataWarta'));
    }
}
