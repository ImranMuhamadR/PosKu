<?php

// fungsi ini akan menformat bilangan desimal dan akan mengembaliakan nilai sesuai format yang di tentukannya
function format_uang($angka){
    return number_format($angka, 0, ',', '.');
}
// fungsi ini akan menghitung bilangan dalam bentuk string
function terbilang($angka){
    $angka = abs($angka);
    $baca = array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas' );
    $terbilang = '';

    if($angka < 12){$terbilang = ' ' . $baca[$angka];
    }elseif($angka < 20){
        $terbilang = terbilang($angka - 10) . ' Belas';
    }elseif($angka < 100){
        $terbilang = terbilang($angka / 10) . ' Puluh' . terbilang($angka % 10);
    }elseif($angka < 200){
        $terbilang = 'Seratus' . terbilang($angka - 100);
    }elseif($angka < 1000){
        $terbilang = terbilang($angka / 100) . ' Ratus' . terbilang($angka % 100);
    }elseif($angka < 2000){
        $terbilang = ' Seribu' . terbilang($angka - 1000);
    }elseif($angka < 1000000){
        $terbilang = terbilang($angka / 1000) . ' Ribu' . terbilang($angka % 1000);
    }elseif($angka < 1000000000)
    $terbilang = terbilang($angka / 1000000) . ' Juta' . terbilang($angka % 1000000);
    
    return $terbilang;
}
// fungsi ini akan membuat tanggal indonesia
function tanggal_indo($tgl, $show_hari = true){
    $nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $nama_bulan = array(1>= 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $tahun = substr($tgl, 0, 4);//2021-03-07
    $bulan = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text = '';

    if($show_hari){
        $urutan_hari = date('w', mktime(0,0,0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari = $nama_hari[$urutan_hari];
        $text .= "$hari, $tanggal $bulan $tahun";

    }else{
        $text .= "$tanggal $bulan $tahun";
    }
    return $text;
}