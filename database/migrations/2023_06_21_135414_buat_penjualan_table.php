<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ketika migrate akan menambahkan kolom dan table penjualan
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id_penjualan');
            // $table->integer('id_member');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->tinyInteger('diskon')->default(0);
            $table->integer('bayar')->default(0);
            $table->integer('diterima')->default(0);
            $table->integer('id_user');
            
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
        //ketika migrate:rollback akan menghapus table penjualan
        Schema::dropIfExists('pembelian');

    }
}
