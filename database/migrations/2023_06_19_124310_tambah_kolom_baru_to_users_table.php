<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomBaruToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //ketika migrate untuk menambahkan kolom baru 
            $table->string('foto')->nullable()->after('password');
            $table->tinyInteger('level')->default(0)->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //ketika migrate:rollback menghapus/drop kolom
            $table->dropColumn([
                'foto', 'level'
            ]);
        });
    }
}
