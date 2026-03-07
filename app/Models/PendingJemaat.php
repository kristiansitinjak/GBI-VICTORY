<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingJemaat extends Model
{
    use HasFactory;

    protected $table = 'pending_jemaats';

    // Status Constants
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'namakeluarga',
        'sektor',
        'alamat',
        'telepon',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'tgl_baptis',
        'tgl_sidi',
        'tgl_nikah',
        'hubungan_keluarga',
        'status', // Kolom pembeda status persetujuan
    ];
}
