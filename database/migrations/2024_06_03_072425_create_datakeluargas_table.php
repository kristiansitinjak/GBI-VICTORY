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
                'Wijk I','Wijk II','Wijk III','Wijk IV','Wijk V',
                'Wijk VI','Wijk VII','Wijk VIII','Wijk IX','Wijk X','Wijk XI'
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