<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\PemasukanView;
use App\Models\PengeluaranView;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sum_pemasukan = Pemasukan::whereMonth('tanggal_pemasukan', '=', date('m'))
       ->whereYear('tanggal_pemasukan','=',date('Y'))
        ->sum('nominal_pemasukan');

        $sum_pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', '=', date('m'))
       ->whereYear('tanggal_pengeluaran','=',date('Y'))
        ->sum('nominal_pengeluaran');

        $sum_pemasukan_all = Pemasukan::sum('nominal_pemasukan');
        $sum_pengeluaran_all = Pengeluaran::sum('nominal_pengeluaran');

        $chart_pemasukan = PemasukanView::where('tahun', date('Y'))->first();
        $chart_pengeluaran = PengeluaranView::where('tahun', date('Y'))->first();

        $data = array(
            'link' => 'home',
            'script' => 'scripthome',
            'sum_pemasukan' => $sum_pemasukan,
            'sum_pengeluaran' => $sum_pengeluaran,
            'sum_pemasukan_all' => $sum_pemasukan_all,
            'sum_pengeluaran_all' => $sum_pengeluaran_all,
            'chart_pemasukan' => $chart_pemasukan,
            'chart_pengeluaran' => $chart_pengeluaran
        );
        return view('halamanutama')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
