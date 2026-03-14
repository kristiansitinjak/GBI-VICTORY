<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajemaat extends Model
{
    use HasFactory;

    protected $table = 'datajemaats';

    protected $fillable = [
        'keluarga_id',
        'nama_lengkap',
        'hubungan_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'telepon',
        'tgl_baptis',
        'tgl_sidi',
        'tgl_nikah',
    ];

    protected $dates = [
        'tanggal_lahir',
        'tgl_baptis',
        'tgl_sidi',
        'tgl_nikah',
    ];

    /**
     * Relasi ke Datakeluarga (induk)
     */
    public function keluarga()
    {
        return $this->belongsTo(Datakeluarga::class, 'keluarga_id');
    }

    /**
     * Helper: hitung umur otomatis
     */
    public function getUmurAttribute()
    {
        return $this->tanggal_lahir
            ? \Carbon\Carbon::parse($this->tanggal_lahir)->age
            : '-';
    }
}