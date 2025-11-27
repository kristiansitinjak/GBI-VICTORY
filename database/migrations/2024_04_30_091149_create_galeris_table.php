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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('gambar');
            $table->string('judul');
            $table->enum('kategori', ['pastoral', 'kegiatan']);
        });
    }

    /**
     * Reverse the migrations.d
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeris');
    }
};
