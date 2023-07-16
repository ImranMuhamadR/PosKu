<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahDiskonToSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting', function (Blueprint $table) {
            //ketika migrate akan meng insert colom/field diskon to table setting
            $table->smallInteger('diskon')
                  ->default(0)
                  ->after('tipe_nota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting', function (Blueprint $table) {
            //ketika migrate:rollback akan menghapus colom diskon
            $table->dropColumn('diskon');
        });
    }
}
