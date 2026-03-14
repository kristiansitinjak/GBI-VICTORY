<?php

namespace App\Http\Controllers;

use App\Models\PendingJemaat;
use App\Models\AdminNotification;
use App\Models\Datakeluarga;
use App\Models\Datajemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingJemaatController extends Controller
{
    public function showForm()
    {
        return view('pendaftaran_jemaat');
    }

    public function submit(Request $request)
    {
        // Pasangan tidak wajib — hanya validasi jika nama diisi
        $request->validate([
            'sektor'        => 'required',
            'alamat'        => 'required',
            'kk.nama'       => 'required|string',
            'kk.hp'         => 'required|numeric',
            'pasangan.nama' => 'nullable|string',
            'pasangan.hp'   => 'nullable|numeric',
        ]);

        DB::transaction(function () use ($request) {
            $kk = $request->kk;

            // 1. Simpan Kepala Keluarga
            $pendingKK = PendingJemaat::create([
                'namakeluarga'      => $kk['nama'],
                'sektor'            => $request->sektor,
                'alamat'            => $request->alamat,
                'telepon'           => $kk['hp'],
                'nama_lengkap'      => $kk['nama'],
                'tempat_lahir'      => $kk['tempat_lahir'] ?? null,
                'tanggal_lahir'     => $kk['tgl_lahir'] ?? null,
                'jenis_kelamin'     => $kk['jk'],
                'pendidikan'        => $kk['pendidikan'] ?? null,
                'pekerjaan'         => $kk['pekerjaan'] ?? null,
                'tgl_baptis'        => $kk['tgl_baptis'] ?? null,
                'tgl_sidi'          => $kk['tgl_sidi'] ?? null,
                'tgl_nikah'         => !empty($kk['tgl_nikah']) ? $kk['tgl_nikah'] : null,
                'status'            => PendingJemaat::STATUS_PENDING,
                'hubungan_keluarga' => 'Kepala Keluarga',
            ]);

            // 2. Simpan Pasangan — cukup cek nama diisi, tidak perlu checkbox
            if (!empty($request->pasangan['nama'])) {
                $ps = $request->pasangan;
                PendingJemaat::create([
                    'namakeluarga'      => $kk['nama'],
                    'sektor'            => $request->sektor,
                    'alamat'            => $request->alamat,
                    'telepon'           => $ps['hp'] ?? null,
                    'nama_lengkap'      => $ps['nama'],
                    'tempat_lahir'      => $ps['tempat_lahir'] ?? null,
                    'tanggal_lahir'     => $ps['tgl_lahir'] ?? null,
                    'jenis_kelamin'     => $ps['jk'] ?? 'P',
                    'pendidikan'        => $ps['pendidikan'] ?? null,
                    'pekerjaan'         => $ps['pekerjaan'] ?? null,
                    'tgl_baptis'        => $ps['tgl_baptis'] ?? null,
                    'tgl_sidi'          => $ps['tgl_sidi'] ?? null,
                    'tgl_nikah'         => !empty($ps['tgl_nikah']) ? $ps['tgl_nikah'] : null,
                    'status'            => PendingJemaat::STATUS_PENDING,
                    'hubungan_keluarga' => 'Pasangan',
                ]);
            }

            // 3. Simpan Anak-anak
            if ($request->has('anak')) {
                foreach ($request->anak as $anak) {
                    if (!empty($anak['nama'])) {
                        PendingJemaat::create([
                            'namakeluarga'      => $kk['nama'],
                            'sektor'            => $request->sektor,
                            'alamat'            => $request->alamat,
                            'nama_lengkap'      => $anak['nama'],
                            'telepon'           => $anak['hp'] ?? null,
                            'tempat_lahir'      => $anak['tempat_lahir'] ?? null,
                            'tanggal_lahir'     => $anak['tgl_lahir'] ?? null,
                            'jenis_kelamin'     => $anak['jk'] ?? 'L',
                            'pendidikan'        => $anak['pendidikan'] ?? null,
                            'pekerjaan'         => $anak['pekerjaan'] ?? null,
                            'tgl_baptis'        => $anak['tgl_baptis'] ?? null,
                            'tgl_sidi'          => $anak['tgl_sidi'] ?? null,
                            'tgl_nikah'         => !empty($anak['tgl_nikah']) ? $anak['tgl_nikah'] : null,
                            'status'            => PendingJemaat::STATUS_PENDING,
                            'hubungan_keluarga' => 'Anak',
                        ]);
                    }
                }
            }

            // 4. Kirim notifikasi ke admin
            AdminNotification::create([
                'type'         => 'pending_jemaat',
                'message'      => 'Pendaftaran Keluarga baru: ' . $kk['nama'],
                'link'         => url('/admin/pending-jemaat'),
                'reference_id' => $pendingKK->id,
            ]);
        });

        return redirect()->back()->with('success', 'Data keluarga telah dikirim ke admin.');
    }

    public function index()
    {
        $pendings = PendingJemaat::where('status', PendingJemaat::STATUS_PENDING)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.pending_jemaat', compact('pendings'));
    }

    public function approve($id)
    {
        $pendingKK = PendingJemaat::where('id', $id)
                        ->where('hubungan_keluarga', 'Kepala Keluarga')
                        ->firstOrFail();

        // Ambil SEMUA anggota (KK + Pasangan + Anak) berdasarkan namakeluarga + sektor
        $semuaAnggota = PendingJemaat::where('namakeluarga', $pendingKK->namakeluarga)
                            ->where('sektor', $pendingKK->sektor)
                            ->where('status', PendingJemaat::STATUS_PENDING)
                            ->get();

        DB::transaction(function () use ($pendingKK, $semuaAnggota) {

            // 1. Buat record Datakeluarga (induk keluarga)
            $keluarga = Datakeluarga::create([
                'nomor_keluarga' => Datakeluarga::generateNomor(),
                'namakeluarga'   => $pendingKK->namakeluarga,
                'sektor'         => $pendingKK->sektor,
                'alamat'         => $pendingKK->alamat,
                'telepon'        => $pendingKK->telepon,
                'status'         => 'aktif',
            ]);

            // 2. Pindahkan semua anggota ke datajemaats dengan keluarga_id yang sama
            foreach ($semuaAnggota as $anggota) {
                Datajemaat::create([
                    'keluarga_id'       => $keluarga->id,
                    'nama_lengkap'      => $anggota->nama_lengkap,
                    'hubungan_keluarga' => $anggota->hubungan_keluarga,
                    'tempat_lahir'      => $anggota->tempat_lahir,
                    'tanggal_lahir'     => $anggota->tanggal_lahir,
                    'jenis_kelamin'     => $anggota->jenis_kelamin,
                    'pendidikan'        => $anggota->pendidikan,
                    'pekerjaan'         => $anggota->pekerjaan,
                    'telepon'           => $anggota->telepon,
                    'tgl_baptis'        => $anggota->tgl_baptis,
                    'tgl_sidi'          => $anggota->tgl_sidi,
                    'tgl_nikah'         => $anggota->tgl_nikah,
                ]);

                $anggota->update(['status' => PendingJemaat::STATUS_APPROVED]);
            }

            // 3. Tandai notifikasi sebagai dibaca
            AdminNotification::where('reference_id', $pendingKK->id)
                             ->where('type', 'pending_jemaat')
                             ->update(['is_read' => true]);
        });

        return redirect()->back()->with('success',
            'Pendaftaran keluarga ' . $pendingKK->namakeluarga . ' disetujui! Semua anggota masuk ke data jemaat.'
        );
    }

    public function reject($id)
    {
        $pending = PendingJemaat::findOrFail($id);
        $pending->update(['status' => PendingJemaat::STATUS_REJECTED]);

        AdminNotification::where('reference_id', $id)
                         ->where('type', 'pending_jemaat')
                         ->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Pendaftaran telah ditolak.');
    }

    public function debugAll()
    {
        return response()->json(PendingJemaat::all());
    }
}