<?php

namespace App\Http\Controllers\Admin;

use App\Models\pengurus;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Http\Controllers\Controller;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPengurus = Pengurus::all();
        return view('pengurus.pengurus', compact('allPengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.tambahpengurus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepengurusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar'=>'required',
            'nama'=>'required',
            'jabatan'=>'required',
            
        ]);

        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'Admin/gambar';

        $file->move($tujuanFile,$namaFile);
        

        $newPengurus = new Pengurus;
        $newPengurus->gambar =$namaFile;
        $newPengurus->nama =$request->nama;
        $newPengurus->jabatan=$request->jabatan;

        $newPengurus->save();
        return redirect("/admin/pengurus")->with('status','Pengurus talah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($pengurusId)
    {
        $pengurus = Pengurus::where('id', $pengurusId)->first();
        return view('pengurus.editpengurus', ['pengurus'=>$pengurus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepengurusRequest  $request
     * @param  \App\Models\pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $pengurusId)
    {
        $request->validate([
            'gambar'=>'required',
            'nama'=> 'required',
            'jabatan'=> 'required',
        ]);
        
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'Admin/gambar';

        $file->move($tujuanFile,$namaFile);

        Pengurus::where('id', $pengurusId)
            ->update([
                'gambar'=>$request->$tujuanFile . '/' . $namaFile,
                'nama'=> $request->nama,
                'jabatan'=>$request->jabatan,
            ]);
        return redirect('/admin/pengurus')->with('status','Warta dengan id'.$pengurusId.'berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy( $pengurusId)
    {
        Pengurus::where('id', $pengurusId)->delete();

        return redirect('/admin/pengurus')->with('status', 'pengurus dengan id ' .$pengurusId. ' berhasil dihapus');
    }
  
}
