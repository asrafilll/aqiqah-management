<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->boolean('is_olahan_daging')->default(false);
            $table->boolean('is_olahan_jeroan')->default(false);
            // 1.telur, 2. ayam, 3.mix vegetable
            $table->bigInteger('menu_pilihan1')->unsigned()->nullable();
            $table->bigInteger('menu_pilihan2')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('menu_pilihan1')->references('id')->on('olahan_kategoris');
            $table->foreign('menu_pilihan2')->references('id')->on('olahan_kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_pakets');
    }
}
