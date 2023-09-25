<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckTable extends Migration
{
    public function up()
    {
        Schema::create('truck', function (Blueprint $table) {
            $table->id('id_truck');
            $table->string('plat_truck');
            $table->string('maksimal_beban_truck');
            $table->enum('status',['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('truck');
    }
}
