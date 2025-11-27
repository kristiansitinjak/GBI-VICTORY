<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datajemaat;
use App\Models\Datakeluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;



class DatajemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allDatajemaat = Datajemaat::all();
        return view('jemaat.datajemaat', compact('allDatajemaat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jemaat.tambahdatajemaat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=[
            'namakeluarga' => 'required',
            'namaayah' => 'required',
            'namaibu' => 'required',
            'sektor' => 'required',
            'alamat' => 'required',
            'namaanak' => 'required',
            ];

        $message =[
            'namakeluarga.requried' =>'Nama Harus Diisi',
            'namaayah.requried' =>'Nama Harus Diisi',
            'namaibu.requried' =>'Nama Harus Diisi',
            'sektor.required' => 'Sektor Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'namaanak.*required' => 'Nama Anak Harus Diisi',
        ];
        $this -> validate($request, $validate, $message);

        $newDatajemaat = new Datajemaat;
        $newDatajemaat->namakeluarga = $request->namakeluarga;
        $newDatajemaat->sektor = $request->sektor;
        $newDatajemaat->alamat = $request->alamat; 
        $newDatajemaat->save();

        $numAnak = count($request->namaanak);

        for($i = 0; $i < $numAnak; $i++) {
            $newDatakeluarga = new Datakeluarga;
            $newDatakeluarga->datajemaat_id = $newDatajemaat->id;
            $newDatakeluarga->namaayah = $request->namaayah;
            $newDatakeluarga->namaibu = $request->namaibu;
            $newDatakeluarga->namaanak = $request->namaanak[$i];
            $newDatakeluarga->save();
        }
        return redirect("/admin/datajemaat")->with('status', 'Datajemaat Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keluarga = Datakeluarga::where('datajemaat_id', $id)->get();
        $jemaat = Datajemaat::find($id);
        return view('jemaat.viewdatajemaat', compact('keluarga', 'jemaat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($datajemaatId)
    {
        $datajemaat = Datajemaat::where('id', $datajemaatId)->first();
        return view('jemaat.editdatajemaat', ['datajemaat'=>$datajemaat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $datajemaatId)
    {
        $request->validate([
            'namakeluarga' => 'required',
            'namaanak' => 'required',
            'alamat' => 'required',
            'sektor' => 'required',

        ]);

        Datajemaat::where('id', $datajemaatId)
            ->update([
                'namakeluarga'=>$request->namakeluarga,
                'namaanak'=>$request->namaanak,
                'alamat'=>$request->alamat,
                'sektor'=>$request->sektor,                
            ]);
        return redirect('/admin/datajemaat')->with('status','datajemaat dengan id'.$datajemaatId.'berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($datajemaatId)
    {
        Datajemaat::where('id', $datajemaatId)->delete();

        return redirect('/admin/datajemaat')->with('status', 'datajemaat dengan id ' .$datajemaatId. ' berhasil dihapus');
    }

    // public function search(Request $request)
    // {
    //     $search = $request->query('search');
    //     $data = DataJemaat::where('nama', 'like', "%{$search}%")
    //         ->orWhere('alamat', 'like', "%{$search}%")
    //         ->paginate(10);
    //     return view('datajemaat', compact('data'));
    // }
}
// ini adalah untuk melakukan pencarian data jemaat berdasarkan parameter yang dimasukkan oleh pengguna melalui query string.