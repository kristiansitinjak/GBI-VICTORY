<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('pending_jemaats', function (Blueprint $table) {
        $table->id();
        $table->string('namakeluarga');
        $table->string('sektor'); // String agar fleksibel saat pending
        $table->text('alamat');
        $table->string('telepon')->nullable();
        
        // --- Kolom Detail (Sama dengan Datajemaat) ---
        $table->string('nama_lengkap');
        $table->string('tempat_lahir')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('jenis_kelamin')->nullable();
        $table->string('pendidikan')->nullable();
        $table->string('pekerjaan')->nullable();
        $table->string('hubungan_keluarga')->nullable();
        
        // --- Status Gerejawi ---
        $table->date('tgl_baptis')->nullable();
        $table->date('tgl_sidi')->nullable();
        $table->date('tgl_nikah')->nullable();
        
        // --- Status Pendaftaran ---
        $table->string('status')->default('pending'); // pending, approved, rejected
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('pending_jemaats');
    }
};
