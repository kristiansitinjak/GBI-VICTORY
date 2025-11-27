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
            $table->timestamps();
            $table->string('namakeluarga');
            $table->enum('sektor',['Wijk I','Wijk II','Wijk III','Wijk IV','Wijk V','Wijk VI','Wijk VII','Wijk VIII','Wijk IX','Wijk X','Wijk XI']);
            $table->string('alamat');

            
        });

    }

    public function down()
    {
        
        Schema::dropIfExists('datajemaats');
    }
};
