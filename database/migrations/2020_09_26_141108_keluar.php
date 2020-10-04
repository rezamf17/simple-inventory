<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_keluar')->constrained('items')->onDelete('cascade')->onUpdate('cascade');
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
         Schema::drop('outs');
    }
}
