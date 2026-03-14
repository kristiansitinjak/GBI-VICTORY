<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakeluarga extends Model
{
    use HasFactory;

    protected $table = 'datakeluargas';

    protected $fillable = [
        'nomor_keluarga',
        'namakeluarga',
        'sektor',
        'alamat',
        'telepon',
        'status',
    ];

    /**
     * Semua anggota keluarga, urut: KK → Pasangan → Anak
     */
    public function anggota()
    {
        return $this->hasMany(Datajemaat::class, 'keluarga_id')
                    ->orderByRaw("FIELD(hubungan_keluarga, 'Kepala Keluarga', 'Pasangan', 'Anak')");
    }

    /**
     * Hanya Kepala Keluarga
     */
    public function kepalakeluarga()
    {
        return $this->hasOne(Datajemaat::class, 'keluarga_id')
                    ->where('hubungan_keluarga', 'Kepala Keluarga');
    }

    /**
     * Generate nomor keluarga otomatis: KK-0001, KK-0002, ...
     */
    public static function generateNomor()
    {
        $last = self::latest('id')->first();
        $nextId = $last ? ($last->id + 1) : 1;
        return 'KK-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }
}