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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengaduan');
            $table->char('nik',16);
            $table->string('judul_pengaduan');
            $table->text('isi_laporan');
            $table->string('foto',225);
            $table->enum('status',[0,'proses','selesai'])->default(0);
            $table->foreign('nik')->references('nik')->on('masyarakat')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
