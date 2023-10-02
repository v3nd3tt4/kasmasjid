<?php
use Carbon\Carbon;

if (! function_exists('tanggalIndo')) {
    function tanggalIndo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}

if(! function_exists('convertk')){
    function convertk($int){
        if($int == 0){
            return 0;
        }else{
            return $int;
        }
    }
}