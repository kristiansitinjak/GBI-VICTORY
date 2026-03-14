<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('datajemaats', function (Blueprint $table) {
            $table->unsignedBigInteger('keluarga_id')->nullable()->after('id');

            // Foreign key ke datakeluargas
            $table->foreign('keluarga_id')
                  ->references('id')
                  ->on('datakeluargas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('datajemaats', function (Blueprint $table) {
            $table->dropForeign(['keluarga_id']);
            $table->dropColumn('keluarga_id');
        });
    }
};