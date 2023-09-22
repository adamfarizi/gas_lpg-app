<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('status_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->string('bukti_pembayaran');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
