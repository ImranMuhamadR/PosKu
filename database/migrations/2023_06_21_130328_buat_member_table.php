<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ketika migration akan menambahkan tabel member
        Schema::create('member', function (Blueprint $table) {
            $table->integer('id_member');
            $table->string('kode_member');
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon');
            
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
        //ketika migrate:rollback akan mengahapus table member
        Schema::dropIfExists('member');
    }
}
