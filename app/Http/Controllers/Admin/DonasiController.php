<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Rules\CaseInsensitiveIn;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JumlahDonasi = Donasi::sum('jumlahdonasi');
        $allDonasi = Donasi::all();
        return view('donasi.donasi', compact('allDonasi', 'JumlahDonasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi.tambahdonasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Log::info('Store method called with data: ', $request->all());

            $request->validate([
                'namapemberi' => 'required',
                'tanggal' => 'required|date',
                'jenis' => ['required', new CaseInsensitiveIn([
                    'pembangunan',
                    'danapensiun',
                    'pedulimasyarakat',
                    'lansia',
                    'sekolahminggu',
                    'remajanaposo',
                    'lainnya',
                    // Add other 'jenis' types here
                ])],
                'jumlahdonasi' => 'required|numeric',
            ]);

            $newDonasi = new Donasi;
            $newDonasi->namapemberi = $request->namapemberi;
            $newDonasi->tanggal = $request->tanggal;
            $newDonasi->jenis = $request->jenis;
            $newDonasi->jumlahdonasi = $request->jumlahdonasi;
            $newDonasi->save();

            return redirect('/admin/donasi')->with('status', 'Donasi Berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error in store method: ', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan donasi. Silakan coba lagi.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implement the logic if needed or remove this method if not used
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $donasiId
     * @return \Illuminate\Http\Response
     */
    public function edit($donasiId)
    {
        $donasi = Donasi::findOrFail($donasiId);
        return view('donasi.editdonasi', ['donasi' => $donasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $donasiId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $donasiId)
    {
        $request->validate([
            'namapemberi' => 'required',
            'tanggal' => 'required|date',
            'jenis' => 'required',
            'jumlahdonasi' => 'required|numeric',
        ]);

        Donasi::where('id', $donasiId)->update([
            'namapemberi' => $request->namapemberi,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'jumlahdonasi' => $request->jumlahdonasi,
        ]);

        return redirect('/admin/donasi')->with('status', 'Donasi dengan ID ' . $donasiId . ' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $donasiId
     * @return \Illuminate\Http\Response
     */
    public function destroy($donasiId)
    {
        Donasi::destroy($donasiId);

        return redirect('/admin/donasi')->with('status', 'Donasi dengan ID ' . $donasiId . ' berhasil dihapus');
    }
}
