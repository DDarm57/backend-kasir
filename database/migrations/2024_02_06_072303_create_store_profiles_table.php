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
        Schema::create('store_profile', function (Blueprint $table) {
            $table->integer("id_store")->autoIncrement();
            $table->integer("kategoriToko_id");
            $table->integer("owners_id");
            $table->string("nama_toko");
            $table->string("provinsi");
            $table->string("kota");
            $table->string("kecamatan");
            $table->string("alamat_lengkap");
            $table->bigInteger("phone_store");
            $table->string("logo");
            $table->string("store_key");
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
        Schema::dropIfExists('store_profile');
    }
};
