<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            //ketika migrate akan menambahkan tabel produk dan kolomnya
            $table->unsignedInteger('id_katagori')->change();
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
            //ketika migrate:rollback akan menghapus tabel dan kembali ke awal
            $table->integer('id_katagori')->change();
            $table->dropForeign('produk_id_katagori_foreign');
        });
    }
}
