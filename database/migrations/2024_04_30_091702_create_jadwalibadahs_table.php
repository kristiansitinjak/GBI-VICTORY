<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalibadahs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('namaibadah');
            $table->string('tanggal');
            $table->string('ayatalkitab');
            $table->string('deskripsi');
            $table->string('pengkhotbah');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwalibadahs');
    }
};
