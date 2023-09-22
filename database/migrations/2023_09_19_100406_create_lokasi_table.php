<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiTable extends Migration
{
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id('id_lokasi');
            $table->string('koordinat_lokasi');
            $table->string('alamat_lokasi_tujuan');
            $table->string('status_pengiriman');
            $table->unsignedBigInteger('id_pengiriman');
            $table->timestamps();

            $table->foreign('id_pengiriman')->references('id_pengiriman')->on('pengiriman');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lokasi');
    }
}
