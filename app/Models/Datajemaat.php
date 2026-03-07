<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajemaat extends Model
{
    use HasFactory;

    protected $table = 'datajemaats';

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
        'hubungan_keluarga', // Penting untuk membedakan peran dalam keluarga
    ];

    // Jika Anda ingin menggunakan format tanggal otomatis (Opsional)
    protected $dates = ['tanggal_lahir', 'tgl_baptis', 'tgl_sidi', 'tgl_nikah'];

    public function keluarga()
    {
        return $this->belongsTo(Datakeluarga::class);
    }
}
