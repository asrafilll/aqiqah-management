<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->enum('cara_pembayaran', ['Credit', 'Tunai']);
            $table->string('ktp', 255);
            $table->string('kk', 255);
            $table->string('bukti_tf', 255);
            $table->integer('jumlah_kambing');
            $table->enum('jenis_kelamin_kambing', ['Jantan', 'Betina']);
            $table->enum('jenis_pesanan', ['Paket Aqiqah', 'Catering Umum', 'Qurban']);
            $table->boolean('is_maklon');
            $table->enum('jenis_paket', ['Paket Ekonomis Manis (Bento)', 'Paket Ekonomis Mewah (Bento)', 'Paket Kambing Masak', 'Paket Nasi Box Hemat', 'Paket Nasi Box Praktis', 'Paket Nasi Box Special', 'Paket Nasi Box Arab', 'Paket Aqiqah Tumpeng']);
            $table->enum('pilihan_nasi', ['Nasi Putih', 'Nasi Kuning', 'Nasi Mandhi', 'Nasi Kebuli', 'Nasi Biryani', 'Nasi Uduk']);
            $table->text('alamat');
            $table->string('jenis_beras_arab');
            $table->integer('jumlah_order');
            $table->string('tanggal_kirim');
            $table->string('jam_tiba_lokasi');
            $table->string('jam_konsumsi');
            $table->enum('pengiriman', ['Dikirim', 'Diambil sendiri', 'Disalurkan']);
            $table->integer('total_harga');
            $table->integer('adjusment')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('total_harga_Setelah_adjusment')->nullable();
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
        Schema::dropIfExists('order_information');
    }
}
