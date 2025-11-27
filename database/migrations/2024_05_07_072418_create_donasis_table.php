<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tanggal');
            $table->enum('jenis', ['pembangunan', 'danapensiun', 'pedulimasyarakat','lansia', 'sekolahminggu', 'remajanaposo', 'lainnya']);
            $table->string('namapemberi');
            $table->integer('jumlahdonasi');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasis');
    }
}
