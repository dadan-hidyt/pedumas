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
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengaduan')->unsigned();
            $table->date('tanggal_tanggapan');
            $table->text('tanggapan');
            $table->bigInteger('id_petugas')->unsigned(); 
            // $table->foreign('id_petugas')->references('id')->on('petugas');
            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapan');
    }
};
