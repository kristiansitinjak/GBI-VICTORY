<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $allGaleri = Galeri::all();
        return view('galeri.galeri', compact('allGaleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri.tambahgaleri');
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
            'gambar'=> 'required',
            'judul'=> 'required',
            'kategori'=> 'required',
        ]);

        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'Admin/gambar';

        $file->move($tujuanFile,$namaFile);

        $newGaleri = new Galeri;
        $newGaleri->gambar =$namaFile;
        $newGaleri->judul =$request->judul;
        $newGaleri->kategori =$request->kategori;

        $newGaleri->save();
        return redirect("/admin/galeri")->with('status','galeri talah berhasil ditambahkan');
        
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
    public function edit($galeriId)
    {
        $galeri = Galeri::where('id', $galeriId)->first();
        return view('galeri.editgaleri', ['galeri'=>$galeri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galeriId)
    {
        $request->validate([
            'gambar'=>'required',
            'judul'=> 'required',
            'kategori'=>'required'
        ]);
        
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'Admin/gambar';

        $file->move($tujuanFile,$namaFile);

        Galeri::where('id', $galeriId)
            ->update([
                'gambar'=>$request->$tujuanFile . '/' . $namaFile,
                'judul'=> $request->judul,
                'kategori'=> $request->kategori,
            ]);
        return redirect('/admin/galeri')->with('status','Warta dengan id'.$galeriId.'berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($galeriId)
    {
        
        Galeri::where('id', $galeriId)->delete();

        return redirect('/admin/galeri')->with('status', 'galeri dengan id ' . $galeriId . ' berhasil dihapus');

    }
}
