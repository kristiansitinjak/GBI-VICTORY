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
        Schema::create('datakeluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datajemaat_id');
            $table->foreign('datajemaat_id')->references('id')->on('datajemaats')->onDelete('cascade');
            $table->string('namaayah');
            $table->string('namaibu');
            $table->string('namaanak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datakeluargas');
    }
};
