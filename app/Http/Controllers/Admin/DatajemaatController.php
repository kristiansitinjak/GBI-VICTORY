<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datakeluarga;
use App\Models\Datajemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatajemaatController extends Controller
{
    // ─────────────────────────────────────────
    // INDEX - Daftar semua keluarga (Admin)
    // ─────────────────────────────────────────
    public function index(Request $request)
    {
        $search = $request->search;
        $status = $request->status ?? 'aktif';

        $allDatajemaat = Datakeluarga::with('kepalakeluarga')
            ->where('status', $status)
            ->when($search, function ($query) use ($search) {
                $query->where('namakeluarga', 'like', "%$search%")
                      ->orWhere('sektor', 'like', "%$search%")
                      ->orWhere('alamat', 'like', "%$search%");
            })
            ->orderBy('sektor')
            ->paginate(10);

        $totalPending = Datakeluarga::where('status', 'pending')->count();

        return view('jemaat.datajemaat', compact('allDatajemaat', 'totalPending', 'status'));
    }

    // ─────────────────────────────────────────
    // CREATE - Form tambah keluarga (Admin)
    // ─────────────────────────────────────────
    public function create()
    {
        return view('jemaat.tambahdatajemaat');
    }

    // ─────────────────────────────────────────
    // STORE - Simpan dari Admin (langsung aktif)
    // ─────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'sektor'  => 'required',
            'alamat'  => 'required',
            'kk.nama' => 'required|string|max:255',
            'kk.hp'   => 'required',
            'kk.jk'   => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $kk = $request->kk;

            // 1. Buat record di datakeluargas
            $keluarga = Datakeluarga::create([
                'nomor_keluarga' => Datakeluarga::generateNomor(),
                'namakeluarga'   => $kk['nama'],
                'sektor'         => $request->sektor,
                'alamat'         => $request->alamat,
                'telepon'        => $kk['hp'],
                'status'         => 'aktif',
            ]);

            // 2. Simpan Kepala Keluarga
            Datajemaat::create([
                'keluarga_id'       => $keluarga->id,
                'nama_lengkap'      => $kk['nama'],
                'hubungan_keluarga' => 'Kepala Keluarga',
                'tempat_lahir'      => $kk['tempat_lahir'] ?? null,
                'tanggal_lahir'     => $kk['tgl_lahir'] ?? null,
                'jenis_kelamin'     => $kk['jk'],
                'pendidikan'        => $kk['pendidikan'] ?? null,
                'pekerjaan'         => $kk['pekerjaan'] ?? null,
                'telepon'           => $kk['hp'],
                'tgl_baptis'        => $kk['tgl_baptis'] ?? null,
                'tgl_sidi'          => $kk['tgl_sidi'] ?? null,
                'tgl_nikah'         => $kk['tgl_nikah'] ?? null,
            ]);

            // 3. Simpan Pasangan (jika ada)
            if (!empty($request->pasangan['nama'])) {
                $ps = $request->pasangan;
                Datajemaat::create([
                    'keluarga_id'       => $keluarga->id,
                    'nama_lengkap'      => $ps['nama'],
                    'hubungan_keluarga' => 'Pasangan',
                    'tempat_lahir'      => $ps['tempat_lahir'] ?? null,
                    'tanggal_lahir'     => $ps['tgl_lahir'] ?? null,
                    'jenis_kelamin'     => $ps['jk'] ?? 'P',
                    'pendidikan'        => $ps['pendidikan'] ?? null,
                    'pekerjaan'         => $ps['pekerjaan'] ?? null,
                    'telepon'           => $ps['hp'] ?? null,
                    'tgl_baptis'        => $ps['tgl_baptis'] ?? null,
                    'tgl_sidi'          => $ps['tgl_sidi'] ?? null,
                    'tgl_nikah'         => $ps['tgl_nikah'] ?? null,
                ]);
            }

            // 4. Simpan Anak-anak (jika ada)
            if ($request->has('anak')) {
                foreach ($request->anak as $anak) {
                    if (!empty($anak['nama'])) {
                        Datajemaat::create([
                            'keluarga_id'       => $keluarga->id,
                            'nama_lengkap'      => $anak['nama'],
                            'hubungan_keluarga' => 'Anak',
                            'tempat_lahir'      => $anak['tempat_lahir'] ?? null,
                            'tanggal_lahir'     => $anak['tgl_lahir'] ?? null,
                            'jenis_kelamin'     => $anak['jk'] ?? 'L',
                            'pendidikan'        => $anak['pendidikan'] ?? null,
                            'pekerjaan'         => $anak['pekerjaan'] ?? null,
                            'telepon'           => $anak['hp'] ?? null,
                            'tgl_baptis'        => $anak['tgl_baptis'] ?? null,
                            'tgl_sidi'          => $anak['tgl_sidi'] ?? null,
                            'tgl_nikah'         => $anak['tgl_nikah'] ?? null,
                        ]);
                    }
                }
            }
        });

        return redirect('/admin/datajemaat')->with('status', 'Data keluarga berhasil ditambahkan!');
    }

    // ─────────────────────────────────────────
    // VIEW DETAIL - Detail satu keluarga
    // ─────────────────────────────────────────
    public function viewDetail($id)
    {
        // $id = ID dari datakeluargas
        $keluarga = Datakeluarga::with('anggota')->findOrFail($id);
        return view('jemaat.viewdatajemaat', compact('keluarga'));
    }

    // ─────────────────────────────────────────
    // EDIT - Form edit satu anggota
    // ─────────────────────────────────────────
    public function edit($id)
    {
        // $id = ID dari datajemaats
        $datajemaat = Datajemaat::with('keluarga')->findOrFail($id);
        return view('jemaat.editdatajemaat', compact('datajemaat'));
    }

    // ─────────────────────────────────────────
    // UPDATE - Update satu anggota
    // ─────────────────────────────────────────
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required',
        ]);

        $jemaat = Datajemaat::findOrFail($id);

        $jemaat->update([
            'nama_lengkap'      => $request->nama_lengkap,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pendidikan'        => $request->pendidikan,
            'pekerjaan'         => $request->pekerjaan,
            'telepon'           => $request->telepon,
            'tgl_baptis'        => $request->tgl_baptis,
            'tgl_sidi'          => $request->tgl_sidi,
            'tgl_nikah'         => $request->tgl_nikah,
        ]);

        // Jika KK, sinkronkan nama & telepon ke datakeluargas
        if ($jemaat->hubungan_keluarga == 'Kepala Keluarga') {
            $jemaat->keluarga->update([
                'namakeluarga' => $request->nama_lengkap,
                'telepon'      => $request->telepon,
            ]);
        }

        return redirect('/admin/datajemaat/view/' . $jemaat->keluarga_id)
            ->with('status', 'Data anggota berhasil diperbarui!');
    }

    // ─────────────────────────────────────────
    // UPDATE KELUARGA - Update sektor & alamat
    // ─────────────────────────────────────────
    public function updateKeluarga(Request $request, $id)
    {
        $request->validate([
            'sektor' => 'required',
            'alamat' => 'required',
        ]);

        Datakeluarga::findOrFail($id)->update([
            'sektor' => $request->sektor,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/datajemaat/view/' . $id)
            ->with('status', 'Data keluarga berhasil diperbarui!');
    }

    // ─────────────────────────────────────────
    // DESTROY - Hapus seluruh keluarga (cascade)
    // ─────────────────────────────────────────
    public function destroy($id)
    {
        Datakeluarga::findOrFail($id)->delete();
        return redirect('/admin/datajemaat')->with('status', 'Data keluarga berhasil dihapus!');
    }

    // ─────────────────────────────────────────
    // DESTROY ANGGOTA - Hapus satu anggota saja
    // ─────────────────────────────────────────
    public function destroyAnggota($id)
    {
        $jemaat = Datajemaat::findOrFail($id);
        $keluargaId = $jemaat->keluarga_id;

        if ($jemaat->hubungan_keluarga == 'Kepala Keluarga') {
            return back()->with('error', 'Kepala Keluarga tidak bisa dihapus sendiri. Hapus seluruh keluarga.');
        }

        $jemaat->delete();
        return redirect('/admin/datajemaat/view/' . $keluargaId)
            ->with('status', 'Anggota berhasil dihapus!');
    }

    // ─────────────────────────────────────────
    // APPROVE - Setujui pendaftaran publik
    // ─────────────────────────────────────────
    public function approve($id)
    {
        $keluarga = Datakeluarga::findOrFail($id);
        $keluarga->update(['status' => 'aktif']);

        return redirect('/admin/datajemaat?status=pending')
            ->with('status', 'Pendaftaran ' . $keluarga->namakeluarga . ' telah disetujui!');
    }

    // ─────────────────────────────────────────
    // REJECT - Tolak & hapus pendaftaran publik
    // ─────────────────────────────────────────
    public function reject($id)
    {
        $keluarga = Datakeluarga::findOrFail($id);
        $nama = $keluarga->namakeluarga;
        $keluarga->delete();

        return redirect('/admin/datajemaat?status=pending')
            ->with('status', 'Pendaftaran ' . $nama . ' telah ditolak.');
    }

    // ─────────────────────────────────────────
    // CETAK KTA
    // ─────────────────────────────────────────
    public function cetakKTA($id)
    {
        $keluarga = \App\Models\Datakeluarga::with('anggota')->findOrFail($id);

        $data = [
            'keluarga'  => $keluarga,
            'nomor_kta' => 'KKJ-' . str_pad($keluarga->id, 4, '0', STR_PAD_LEFT),
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.kta_template', $data);
        $pdf->setPaper('A4', 'landscape');

        $safeName = \Illuminate\Support\Str::slug($keluarga->namakeluarga, '_');
        return $pdf->stream('KKJ_' . $safeName . '.pdf');
    }

    // ─────────────────────────────────────────
    // CETAK KKJ - Kartu Keluarga Jemaat (A4 Landscape)
    // Tambahkan method ini ke dalam DatajemaatController
    // $id = ID dari datakeluargas
    // ─────────────────────────────────────────
    public function cetakKKJ($id)
    {
        $keluarga = Datakeluarga::with('anggota')->findOrFail($id);

        $pdf = Pdf::loadView('jemaat.kkj_template', compact('keluarga'));
        $pdf->setPaper('A4', 'landscape');

        $safeName = \Illuminate\Support\Str::slug($keluarga->namakeluarga, '_');
        return $pdf->stream('KKJ_' . $safeName . '.pdf');
    }

    
}

