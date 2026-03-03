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
        $data = $request->validate([
            'namakeluarga' => 'required|string|max:255',
            'sektor' => 'required|string',
            'telepon' => 'nullable|string|max:25',
            'alamat' => 'required|string',
        ]);

        // Pastikan status default terisi
        $data['status'] = PendingJemaat::STATUS_PENDING;

        $pending = PendingJemaat::create($data);

        AdminNotification::create([
            'type' => 'pending_jemaat',
            'message' => 'Jemaat atas nama ' . $data['namakeluarga'] . ' ingin mendaftarkan diri',
            'link' => url('/admin/pending-jemaat'),
            'reference_id' => $pending->id,
        ]);

        return redirect()->back()->with('success', 'Data telah dikirim. Tunggu persetujuan admin.');
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
            // 1. Simpan ke tabel utama Datajemaat
            Datajemaat::create([
                'namakeluarga' => $pending->namakeluarga,
                'sektor' => $pending->sektor,
                'alamat' => $pending->alamat,
                'telepon' => $pending->telepon, // Pastikan kolom ini ada di model Datajemaat
            ]);

            // 2. Update status pendaftaran
            $pending->update(['status' => PendingJemaat::STATUS_APPROVED]);

            // 3. Tandai notifikasi sebagai sudah dibaca
            AdminNotification::where('reference_id', $id)
                             ->where('type', 'pending_jemaat')
                             ->update(['is_read' => true]);
        });

        return redirect()->back()->with('success', 'Pendaftaran disetujui dan masuk ke database jemaat.');
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
