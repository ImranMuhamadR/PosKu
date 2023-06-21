<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatKatagoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ini
        Schema::create('katagori', function (Blueprint $table) {
            //ketika migrate untuk menambahkan kolom baru seperti dibawah ini 
            $table->increments('id_katagori');
            $table->string('nama_katagori')->unique();
            
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
            //ketika migrate:rollback menghapus/drop kolom dibawah ini
            Schema::dropIfExists('katagori');
    }
}
