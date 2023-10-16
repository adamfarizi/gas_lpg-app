<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenTable extends Migration
{
    public function up()
    {
        Schema::create('agen', function (Blueprint $table) {
            $table->id('id_agen');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default('agen');
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agen');
    }
}
