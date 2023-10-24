<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->date('tanggal_transaksi');
            $table->string('resi_transaksi');
            $table->integer('jumlah_transaksi');
            $table->decimal('total_transaksi', 50, 0);
            $table->enum('status_pengiriman',['Belum Dikirim','Dikirim', 'Diterima']);
            $table->unsignedBigInteger('id_agen');
            $table->unsignedBigInteger('id_gas');
            $table->unsignedBigInteger('id_pembayaran');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_pengiriman')->nullable();
            $table->timestamps();

            $table->foreign('id_agen')->references('id_agen')->on('agen');
            $table->foreign('id_gas')->references('id_gas')->on('gas');
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayaran');            
            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->foreign('id_pengiriman')->references('id_pengiriman')->on('pengiriman');

        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
