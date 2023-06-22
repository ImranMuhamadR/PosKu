<?php

// fungsi ini akan menformat bilangan desimal dan akan mengembaliakan nilai sesuai format yang di tentukannya
/*
!contoh 
misalkan kita berikan argument ke paramerter angka (100000).
maka secara otomatis parameter angka akan di format menjadi (100.000)
*/ 
function format_uang($angka){
    return number_format($angka, 0, ',', '.');
}
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