<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('nama_sohilbul_aqiqah', 255);
            $table->string('gender_sohilbul_aqiqah', 10);
            $table->string('tanggal_lahir', 255);
            $table->string('tanggal_kirim', 255);
            $table->string('nama_ayah', 255);
            $table->string('nama_ibu', 255);
            $table->text('alamat');
            $table->string('grup_area', 255);
            $table->string('kecamatan', 255);
            $table->string('kelurahan', 255);
            $table->string('kode_pos', 255);
            $table->integer('no_telp2');
            $table->string('masak_di_cabang', 255);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('cust_information');
    }
}
