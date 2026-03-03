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
        $table->string('sektor');
        $table->string('telepon')->nullable(); // Tambahkan ini
        $table->text('alamat');
        $table->string('status')->default('pending'); // Default status
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('pending_jemaats');
    }
};
