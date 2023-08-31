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
            $table->tinyInteger('diskon')->default(0);
            $table->integer('harga_jual');
            $table->integer('stok');
            
            $table->timestamps();

            $table->foreign('id_katagori')
            ->references('id_katagori')
            ->on('katagori')
            ->onUpdate('restrict')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign('produk_id_katagori_foreign');
        });
        
        //ketika migrate:rollback akan mengahapus tabel produk
        Schema::dropIfExists('produk');
    }
}
