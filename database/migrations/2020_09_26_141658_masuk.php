<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Masuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('ins', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_masuk')->constrained('items')->onDelete('cascade')->onUpdate('cascade');
        $table->date('tanggal');
        $table->string('keterangan', 255)->nullable();
        $table->integer('jumlah');
        $table->enum('is_actived', ['0','1']);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ins');
    }
}
