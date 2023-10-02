<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::statement(" CREATE VIEW pemasukanView AS
        select
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '01'  
        ) 
        as pemasukan_januari ,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '02'  
        ) 
        as pemasukan_februari,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '03'  
        ) 
        as pemasukan_maret,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '04'  
        ) 
        as pemasukan_april,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '05'  
        ) 
        as pemasukan_mei,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '06'  
        ) 
        as pemasukan_juni,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '07'  
        ) 
        as pemasukan_juli,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '08'  
        ) 
        as pemasukan_agustus,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '09'  
        ) 
        as pemasukan_september,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '10'  
        ) 
        as pemasukan_oktober,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '11'  
        ) 
        as pemasukan_november,
        (
        select COALESCE(sum(nominal_pemasukan),0) from tb_pemasukan where month(tanggal_pemasukan) = '12'  
        ) 
        as pemasukan_desember,
        year(tanggal_pemasukan) as tahun
        from tb_pemasukan 
        group by year(tanggal_pemasukan)
        
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("DROP VIEW pemasukanView");
    }
};
