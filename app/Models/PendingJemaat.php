<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingJemaat extends Model
{
    use HasFactory;

    protected $table = 'pending_jemaats';

    protected $fillable = [
        'namakeluarga',
        'sektor',
        'alamat',
        'telepon',
        'lat',
        'lng',
        'status', // pending, approved, rejected
    ];

    const STATUS_PENDING  = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
}
