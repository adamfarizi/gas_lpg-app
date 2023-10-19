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
            $table->enum('status_pembayaran',['Sudah Bayar','Proses' , 'Belum Bayar'])->default('Belum Bayar');
            $table->datetime('tanggal_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
