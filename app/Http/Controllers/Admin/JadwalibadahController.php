<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Jadwalibadah;
use App\Http\Controllers\Controller;

class JadwalibadahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allJadwalibadah = Jadwalibadah::all();
        return view('jadwalibadah.jadwalibadah', compact('allJadwalibadah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwalibadah.tambahjadwalibadah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaibadah' => 'required',
            'ayatalkitab' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'pengkhotbah' => 'required',
            
        ]);

        $newJadwalibadah = new Jadwalibadah();
        $newJadwalibadah->namaibadah = $request->namaibadah;
        $newJadwalibadah->ayatalkitab = $request->ayatalkitab;
        $newJadwalibadah->tanggal = $request->tanggal;
        $newJadwalibadah->deskripsi = $request->deskripsi;
        $newJadwalibadah->pengkhotbah = $request->pengkhotbah;
       

        $newJadwalibadah->save();
        return redirect("/admin/jadwalibadah")->with('status', 'Jadwalibadah Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($jadwalibadahId)
    {
        $jadwalibadah = Jadwalibadah::where('id', $jadwalibadahId)->first();
        return view('jadwalibadah.editjadwalibadah', ['jadwalibadah'=>$jadwalibadah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jadwalibadahId)
    {
            $request->validate([
                'namaibadah' => 'required',
                'ayatalkitab' => 'required',
                'tanggal' => 'required',
                'deskripsi' => 'required',
                'pengkhotbah' => 'required',
                
            ]);
    
            Jadwalibadah::where('id', $jadwalibadahId)
                ->update([
                    'namaibadah'=>$request->namaibadah,
                    'ayatalkitab'=>$request->ayatalkitab,
                    'tanggal'=>$request->tanggal,
                    'deskripsi'=>$request->deskripsi,
                    'pengkhotbah'=>$request->pengkhotbah,
                    
                    
                ]);
            return redirect('/admin/jadwalibadah')->with('status','jadwalibadah dengan id'.$jadwalibadahId.'berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadwalibadahId)
    {
        
        Jadwalibadah::where('id', $jadwalibadahId)->delete();

        return redirect('/admin/jadwalibadah')->with('status', 'jadwalibadah dengan id ' .$jadwalibadahId. ' berhasil dihapus');
    }
}
