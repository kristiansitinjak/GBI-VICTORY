<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('datajemaats', function (Blueprint $table) {
        $table->id();
        $table->string('namakeluarga');
        $table->enum('sektor',['Wijk I','Wijk II','Wijk III','Wijk IV','Wijk V','Wijk VI','Wijk VII','Wijk VIII','Wijk IX','Wijk X','Wijk XI']);
        $table->string('alamat');
        $table->string('telepon')->nullable();
        
        // --- Kolom Detail Identitas ---
        $table->string('nama_lengkap');
        $table->string('tempat_lahir')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('pendidikan')->nullable();
        $table->string('pekerjaan')->nullable();
        $table->string('hubungan_keluarga'); // Kepala Keluarga, Pasangan, atau Anak
        
        // --- Status Gerejawi ---
        $table->date('tgl_baptis')->nullable();
        $table->date('tgl_sidi')->nullable();
        $table->date('tgl_nikah')->nullable();
        
        $table->timestamps();
    });
}


    public function down()
    {
        
        Schema::dropIfExists('datajemaats');
    }
};
