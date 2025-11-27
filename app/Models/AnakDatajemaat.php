<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnakDatajemaat extends Model
{
    protected $fillable = [
        'datajemaat_id',
        'nama',
        'tgl_lahir',
        'status_babtis',
        'alamat',
        'jeniskelamin',
    ];

    public function datajemaat()
    {
        return $this->belongsTo(Datajemaat::class);
    }
}
