<?php

namespace App\Http\Controllers;

use App\Models\PendingJemaat;
use App\Models\AdminNotification;
use App\Models\Datajemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class PendingJemaatController extends Controller
{
    public function showForm()
    {
        return view('pendaftaran_jemaat');
    }

    public function submit(Request $request)
    {
        // 1. Validasi dinamis: Pasangan hanya wajib jika checkbox nikah dicentang
        $rules = [
            'sektor' => 'required',
            'alamat' => 'required',
            'kk.nama' => 'required|string',
            'kk.hp' => 'required|numeric',
        ];

        if ($request->has('sudah_nikah')) {
            $rules['pasangan.nama'] = 'required|string';
            $rules['pasangan.hp'] = 'required|numeric';
            $rules['kk.tgl_nikah'] = 'required|date';
        }

        $request->validate($rules);

        DB::transaction(function () use ($request) {
            $kk = $request->kk;

            // Simpan Kepala Keluarga
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
                'tgl_nikah'         => $request->has('sudah_nikah') ? $kk['tgl_nikah'] : null,
                'status'            => PendingJemaat::STATUS_PENDING,
                'hubungan_keluarga' => 'Kepala Keluarga'
            ]);

            // Simpan Pasangan (hanya jika checkbox nikah aktif)
            if ($request->has('sudah_nikah') && !empty($request->pasangan['nama'])) {
                $ps = $request->pasangan;
                PendingJemaat::create([
                    'namakeluarga'      => $kk['nama'],
                    'sektor'            => $request->sektor,
                    'alamat'            => $request->alamat,
                    'telepon'           => $ps['hp'],
                    'nama_lengkap'      => $ps['nama'],
                    'tempat_lahir'      => $ps['tempat_lahir'] ?? null,
                    'tanggal_lahir'     => $ps['tgl_lahir'] ?? null,
                    'jenis_kelamin'     => $ps['jk'],
                    'pendidikan'        => $ps['pendidikan'] ?? null,
                    'pekerjaan'         => $ps['pekerjaan'] ?? null,
                    'tgl_baptis'        => $ps['tgl_baptis'] ?? null,
                    'tgl_sidi'          => $ps['tgl_sidi'] ?? null,
                    'tgl_nikah'         => $kk['tgl_nikah'], // Tanggal nikah sama dengan KK
                    'status'            => PendingJemaat::STATUS_PENDING,
                    'hubungan_keluarga' => 'Pasangan'
                ]);
            }

            // Simpan Anak-anak
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
                            'jenis_kelamin'     => $anak['jk'],
                            'pendidikan'        => $anak['pendidikan'] ?? null,
                            'pekerjaan'         => $anak['pekerjaan'] ?? null,
                            'tgl_baptis'        => $anak['tgl_baptis'] ?? null,
                            'tgl_sidi'          => $anak['tgl_sidi'] ?? null,
                            'status'            => PendingJemaat::STATUS_PENDING,
                            'hubungan_keluarga' => 'Anak'
                        ]);
                    }
                }
            }

            // Kirim Notifikasi
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
        // Query disederhanakan: Ambil yang berstatus 'pending' saja
        $pendings = PendingJemaat::where('status', PendingJemaat::STATUS_PENDING)
                        ->orderBy('created_at', 'desc')
                        ->get();
                        
        return view('admin.pending_jemaat', compact('pendings'));
    }

    public function approve($id)
    {
        $pending = PendingJemaat::findOrFail($id);

        // Gunakan Transaction agar jika salah satu gagal, semua dibatalkan
        DB::transaction(function () use ($pending, $id) {
            
            // 1. Simpan SEMUA data jemaat (Nama, Tgl Lahir, Baptis, dll) ke tabel utama
            // pastikan $fillable di model Datajemaat sudah lengkap
            Datajemaat::create($pending->only([
                'namakeluarga', 'sektor', 'alamat', 'telepon', 
                'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
                'pendidikan', 'pekerjaan', 'tgl_baptis', 'tgl_sidi', 
                'tgl_nikah', 'hubungan_keluarga'
            ]));

            // 2. Update status pendaftaran menjadi approved
            $pending->update(['status' => PendingJemaat::STATUS_APPROVED]);

            // 3. Tandai notifikasi sebagai sudah dibaca
            AdminNotification::where('reference_id', $id)
                            ->where('type', 'pending_jemaat')
                            ->update(['is_read' => true]);
        });

        return redirect()->back()->with('success', 'Pendaftaran disetujui dan seluruh detail jemaat masuk ke database.');
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
