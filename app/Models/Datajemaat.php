<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajemaat extends Model
{
    use HasFactory;

    protected $table = 'datajemaats';

    // Tambahkan baris $fillable di bawah ini
    protected $fillable = [
        'namakeluarga',
        'sektor',
        'alamat',
        'telepon', // pastikan kolom ini ada di database tabel datajemaats
    ];

    public function keluarga()
    {
        return $this->belongsTo(Datakeluarga::class);
    }
}
