<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;

    protected $table = 'admin_notifications';

    protected $fillable = [
        'type',        // 'pending_jemaat', dll
        'message',     // pesan notifikasi
        'link',        // link untuk aksi
        'reference_id', // ID dari pending_jemaats atau yang lain
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
