<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->integer("id_barang")->autoIncrement();
            $table->integer("store_key");
            $table->string("kode_barang");
            $table->string("nama_barang");
            $table->integer("kategori_id");
            $table->bigInteger("harga_asli");
            $table->bigInteger("harga_jual");
            $table->integer("stok");
            $table->string("satuan");
            $table->integer("diskon");
            $table->string("gambar")->nullable();
            $table->string("deskripsi")->nullable();
            $table->date("tanggal")->nullable();
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
        Schema::dropIfExists('data_barang');
    }
};
