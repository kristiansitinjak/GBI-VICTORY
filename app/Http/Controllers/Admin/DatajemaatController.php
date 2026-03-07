<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datajemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatajemaatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        
        // Menampilkan hanya Kepala Keluarga agar tidak duplikat di tabel utama
        $allDatajemaat = Datajemaat::where('hubungan_keluarga', 'Kepala Keluarga')
            ->when($search, function($query) use ($search) {
                return $query->where('namakeluarga', 'like', "%$search%")
                            ->orWhere('sektor', 'like', "%$search%")
                            ->orWhere('alamat', 'like', "%$search%");
            })
            ->paginate(10);

        return view('jemaat.datajemaat', compact('allDatajemaat'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $kk = $request->kk;

            // 1. Simpan Kepala Keluarga
            Datajemaat::create(array_merge($kk, [
                'namakeluarga' => $kk['nama'],
                'nama_lengkap' => $kk['nama'],
                'telepon'      => $kk['hp'],
                'sektor'       => $request->sektor,
                'alamat'       => $request->alamat,
                'hubungan_keluarga' => 'Kepala Keluarga'
            ]));

            // 2. Simpan Pasangan (Jika ada nama)
            if (!empty($request->pasangan['nama'])) {
                Datajemaat::create(array_merge($request->pasangan, [
                    'namakeluarga' => $kk['nama'],
                    'nama_lengkap' => $request->pasangan['nama'],
                    'telepon'      => $request->pasangan['hp'],
                    'sektor'       => $request->sektor,
                    'alamat'       => $request->alamat,
                    'hubungan_keluarga' => 'Pasangan'
                ]));
            }

            // 3. Simpan Anak-anak
            if ($request->has('anak')) {
                foreach ($request->anak as $anak) {
                    if (!empty($anak['nama'])) {
                        Datajemaat::create(array_merge($anak, [
                            'namakeluarga' => $kk['nama'],
                            'nama_lengkap' => $anak['nama'],
                            'telepon'      => $anak['hp'],
                            'sektor'       => $request->sektor,
                            'alamat'       => $request->alamat,
                            'hubungan_keluarga' => 'Anak'
                        ]));
                    }
                }
            }
        });

        return redirect("/admin/datajemaat")->with('status', 'Satu paket keluarga berhasil ditambahkan');
    }


    public function viewDetail($id)
    {
        $jemaat = Datajemaat::findOrFail($id);
        
        // Mengambil seluruh anggota keluarga berdasarkan Nama Keluarga & Sektor
        $keluarga = Datajemaat::where('namakeluarga', $jemaat->namakeluarga)
                            ->where('sektor', $jemaat->sektor)
                            ->orderByRaw("FIELD(hubungan_keluarga, 'Kepala Keluarga', 'Pasangan', 'Anak') ASC")
                            ->get();

        // PERBAIKAN: Mengarahkan ke file 'viewdatajemaat' sesuai yang ada di folder Anda
        return view('jemaat.viewdatajemaat', compact('keluarga', 'jemaat'));
    }

    public function edit($id)
    {
        $datajemaat = Datajemaat::findOrFail($id);
        return view('jemaat.editdatajemaat', compact('datajemaat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'namakeluarga' => 'required',
            'alamat' => 'required',
            'sektor' => 'required',
        ]);

        $jemaat = Datajemaat::findOrFail($id);

        // Jika yang diedit Kepala Keluarga, sinkronkan Alamat & Sektor ke anggota lain
        if ($jemaat->hubungan_keluarga == 'Kepala Keluarga') {
            Datajemaat::where('namakeluarga', $jemaat->namakeluarga)
                ->where('sektor', $jemaat->sektor)
                ->update([
                    'namakeluarga' => $request->namakeluarga,
                    'alamat' => $request->alamat,
                    'sektor' => $request->sektor,
                ]);
        }

        $jemaat->update($request->all());

        return redirect('/admin/datajemaat')->with('status', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jemaat = Datajemaat::findOrFail($id);

        // Hapus satu paket keluarga jika yang dihapus adalah Kepala Keluarga
        if ($jemaat->hubungan_keluarga == 'Kepala Keluarga') {
            Datajemaat::where('namakeluarga', $jemaat->namakeluarga)
                ->where('sektor', $jemaat->sektor)
                ->delete();
            $msg = "Satu keluarga berhasil dihapus";
        } else {
            $jemaat->delete();
            $msg = "Anggota keluarga berhasil dihapus";
        }

        return redirect('/admin/datajemaat')->with('status', $msg);
    }

    public function cetakKTA($id)
    {
        $jemaat = Datajemaat::findOrFail($id);
        $data = [
            'jemaat' => $jemaat,
            'nomor_kta' => 'KTA-' . str_pad($jemaat->id, 4, '0', STR_PAD_LEFT)
        ];

        $pdf = Pdf::loadView('admin.kta_template', $data);
        $pdf->setPaper([0, 0, 243.78, 153.07], 'landscape');
        
        $safeName = Str::slug($jemaat->nama_lengkap, '_');
        return $pdf->stream('KTA_' . $safeName . '.pdf');
    }

    public function create()
    {
        return view('jemaat.tambahdatajemaat');
    }
}
