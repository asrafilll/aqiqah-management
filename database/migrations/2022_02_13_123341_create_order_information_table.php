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
            $table->bigInteger('jenis_paket_id')->unsigned();
            $table->bigInteger('nasi_id')->unsigned();
            $table->text('alamat');
            $table->enum('jenis_beras_arab', ['Beras Lokal', 'Beras', 'Basmati']);
            $table->integer('jumlah_order');
            $table->string('tanggal_kirim');
            $table->string('jam_tiba_lokasi');
            $table->string('jam_konsumsi');
            $table->enum('pengiriman', ['Dikirim', 'Diambil sendiri', 'Disalurkan']);
            $table->integer('total_harga');
            $table->integer('biaya_tambahan')->nullable();
            $table->integer('diskon')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('total_harga_setelah_adjusment')->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('nasi_id')->references('id')->on('nasis');
            $table->foreign('jenis_paket_id')->references('id')->on('jenis_pakets');
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
