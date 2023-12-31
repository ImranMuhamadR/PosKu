<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'PosKu',
            'alamat' => 'Jl. Samadikun No. 1',
            'telepon' => '08170187676',
            'tipe_nota' => 1, // kecil
            'diskon' => 5,
            'path_logo' => '/img/logo3.png',
            'path_kartu_member' => '/img/langgan_logo.png',
        ]);
    }
}
