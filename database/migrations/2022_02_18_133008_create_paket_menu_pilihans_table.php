<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketMenuPilihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_menu_pilihans', function (Blueprint $table) {
            $table->id();
            $table->integer('urutan_menu');
            $table->bigInteger('menu_pilihan_id')->unsigned();
            $table->bigInteger('jenis_paket_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('menu_pilihan_id')->references('id')->on('menu_pilihans');
            $table->foreign('jenis_paket_id')->references('id')->on('jenis_pakets');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_menu_pilihans');
    }
}
