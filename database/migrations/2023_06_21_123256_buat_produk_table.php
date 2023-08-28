<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ketika migrate akan menambahkan kolom baru pada table produk
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->unsignedInteger('id_katagori');
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->string('tipe');
            $table->string('merk');
            $table->date('tanggal');
            $table->string('supplier');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok');
            
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
        //ketika migrate:rollback akan mengahapus tabel produk
        Schema::dropIfExists('produk');
    }
}
