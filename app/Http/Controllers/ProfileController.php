<?php

namespace App\Http\Controllers;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $dataPengurus = Pengurus::all();
        return view('tampilan.profile', compact('dataPengurus'));

    }
}
