<style>
    /* Red border */
hr.new1 {
  border-top: 50px solid black;
  margin-top:0px
}
</style>
<h3 style="margin-bottom:0px; text-align:center">{{$tb_prodil_masjid->nama_masjid}}</h3>
<p style="text-align:center;margin-top:0px">{{$tb_prodil_masjid->alamat_masjid}}</p>
<hr class="new1">

<br><br>
<div style="text-align: center; font-weight:bold"> <u>Laporan pengeluaran</u></div>
<div style="text-align: center; ">
{{tanggalindo($dari)}} s/d {{tanggalindo($sampai)}}
</div>

<br><br>
<table border="1" style="border: 1px solid black;border-collapse: collapse;" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>tanggal</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no=1; $sum=0;
        @endphp
        @foreach ($q as $r)
        @php $sum = $sum + $r->nominal_pengeluaran; @endphp
        <tr>
            <td>{{$no++}}.</td>
            <td>{{$r->nama_pengeluaran}}</td>
            <td>{{tanggalindo($r->tanggal_pengeluaran)}}</td>
            <td>@currency($r->nominal_pengeluaran)</td>
            
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>@currency($sum)</th>    
        </tr>
    </tfoot>
</table>

