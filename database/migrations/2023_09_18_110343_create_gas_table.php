<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasTable extends Migration
{
    public function up()
    {
        Schema::create('gas', function (Blueprint $table) {
            $table->id('id_gas');
            $table->string('jenis_gas');
            $table->integer('stock_gas');
            $table->integer('harga_gas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gas');
    }
}
