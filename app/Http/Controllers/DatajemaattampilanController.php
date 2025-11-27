<?php

namespace App\Http\Controllers;
use App\Models\Datajemaat;
use App\Models\Datakeluarga;
use Illuminate\Http\Request;

class DatajemaattampilanController extends Controller
{
    public function index()
    {
        $data = datajemaat::all();
    return view('tampilan.datajemaat', compact('data'));

    }
        // public function search(Request $request)
        // {
        //     $search = $request->query('search');
        //     $data = datajemaat::where('nama', 'like', "%{$search}%")
        //         ->orWhere('alamat', 'like', "%{$search}%")
        //         ->paginate(10);
        //     return view('tampilan.datajemaat', compact('data', 'search'));
        // }

    public function show($id){
        $keluarga = Datakeluarga::where('datajemaat_id', $id)->get();
        $jemaat = Datajemaat::find($id);

        return view('tampilan.viewdatajemaat', compact('keluarga', 'jemaat'));
    }

}
