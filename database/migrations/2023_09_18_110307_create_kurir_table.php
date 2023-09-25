<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurirTable extends Migration
{
    public function up()
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->id('id_kurir');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default('kurir');
            $table->string('password');
            $table->enum('status',['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kurir');
    }
}
