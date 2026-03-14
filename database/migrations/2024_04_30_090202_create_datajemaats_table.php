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

            // ── keluarga_id akan ditambah SETELAH datakeluargas dibuat ──
            // Jangan taruh foreign key di sini karena datakeluargas
            // belum ada saat migration ini dijalankan

            $table->string('nama_lengkap');
            $table->string('hubungan_keluarga'); // Kepala Keluarga, Pasangan, Anak
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('telepon')->nullable();

            // Status Gerejawi
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