<?php

namespace App\Http\Controllers;
use App\Models\Tb_profil_masjid;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemasukan;
use Carbon\Carbon;

use \Mpdf\Mpdf as PDF;
use Illuminate\Support\Facades\Storage;

class LaporanPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }

        $data = array(
            'link' => 'lpemasukan'
        );
		return view('laporanpemasukan')->with($data);
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

    // public function proses(Request $request){
    //     $dari =  $request->input('dari');
    //     $sampai =  $request->input('sampai');
        
    //     $convert_dari = strtotime($dari);
    //     $convert_sampai = strtotime($sampai);

    //     if($convert_dari == $convert_sampai){
    //         $q = Pemasukan::where('tanggal_pemasukan', $dari)->orderBy('id', 'DESC')->get();
    //     }else{
    //         $q = Pemasukan::whereBetween('tanggal_pemasukan', [$dari, $sampai])->orderBy('id', 'DESC')->get();
    //     }
    //     $data = array(
    //         'link' => 'lpemasukan',
    //         'dari' => $dari,
    //         'sampai' => $sampai
    //      );

    //     // return view('laporanpemasukandetail', compact('q'))->with($data);
    // }

    public function proses(Request $request){
        $dari =  $request->input('dari');
        $sampai =  $request->input('sampai');
        
        $convert_dari = strtotime($dari);
        $convert_sampai = strtotime($sampai);

        if($convert_dari == $convert_sampai){
            $q = Pemasukan::where('tanggal_pemasukan', $dari)->orderBy('id', 'DESC')->get();
        }else{
            $q = Pemasukan::whereBetween('tanggal_pemasukan', [$dari, $sampai])->orderBy('id', 'DESC')->get();
        }

        $tb_profil_masjid = Tb_profil_masjid::first();
        $data = array(
            'link' => 'lpemasukan',
            'dari' => $dari,
            'sampai' => $sampai,
            'tb_prodil_masjid' => $tb_profil_masjid
         );
        // Setup a filename 
        $documentFileName = "fun.pdf";
 
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        $document->WriteHTML(view('laporanpemasukandetail', compact('q'))->with($data));
         
        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }
}
