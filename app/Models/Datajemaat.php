<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajemaat extends Model
{
    use HasFactory;
    protected $table =('datajemaats');
    

    public function keluarga(){
        return $this->belongsTo((Datakeluarga::class));
    }
}
