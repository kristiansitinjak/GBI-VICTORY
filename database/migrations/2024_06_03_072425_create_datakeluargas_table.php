<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('datakeluargas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_keluarga')->unique(); // Auto: KK-0001
            $table->string('namakeluarga');
            $table->enum('sektor', [
                'FA Pintu Angin - Mela',
                'FA Ketapang - K. Keterapung',
                'FA Simare-mare - Sibolga Julu',
                'FA Kota',
                'FA Parombuman',
                'FA Pandan',
            ]);
            $table->string('alamat');
            $table->string('telepon')->nullable();
            $table->enum('status', ['aktif', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datakeluargas');
    }
};