<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ketika migrate akan menambahkan kolom dan table pembelian 
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('id_pembelian');
            $table->integer('id_supplier');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->integer('bayar')->default(0);
            
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
        //ketika migrate:rollback akan menghapus table pembelian
        Schema::dropIfExists('pembelian');
    }
}
