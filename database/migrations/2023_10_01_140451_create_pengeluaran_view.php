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
        \DB::statement(" CREATE VIEW pengeluaranView AS
        select
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '01'  
        ) 
        as pengeluaran_januari ,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '02'  
        ) 
        as pengeluaran_februari,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '03'  
        ) 
        as pengeluaran_maret,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '04'  
        ) 
        as pengeluaran_april,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '05'  
        ) 
        as pengeluaran_mei,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '06'  
        ) 
        as pengeluaran_juni,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '07'  
        ) 
        as pengeluaran_juli,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '08'  
        ) 
        as pengeluaran_agustus,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '09'  
        ) 
        as pengeluaran_september,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '10'  
        ) 
        as pengeluaran_oktober,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '11'  
        ) 
        as pengeluaran_november,
        (
        select COALESCE(sum(nominal_pengeluaran),0) from tb_pengeluaran where month(tanggal_pengeluaran) = '12'  
        ) 
        as pengeluaran_desember,
        year(tanggal_pengeluaran) as tahun
        from tb_pengeluaran 
        group by year(tanggal_pengeluaran)
        
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("DROP VIEW pengeluaranView");
    }
};
