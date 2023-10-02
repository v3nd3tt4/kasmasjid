<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
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
        $row = Pengeluaran::orderBy('id', 'DESC')->get();;
        $data = array(
            'link' => 'pengeluaran',
            'script' => 'scriptpengeluaran'
        );
		return view('pengeluaran', compact('row'))->with($data);
    }

    public function getData(Request $request){
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        $q = Pengeluaran::where('id', $id)->first();
        return $q->toJson();
    }

    public function getToken(Request $request){
        $csrf = csrf_token();
        return response()->json($csrf);
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
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $request->validate([
            'nama_pengeluaran' => 'required',
            'nominal_pengeluaran' => 'required',
            'tanggal_pengeluaran' => 'required',
        ]);
        try{
            $simpan = Pengeluaran::create($request->all());
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
            ]);
        }
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
    public function update(Request $request)
    {
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        $nama_pengeluaran =  $request->input('nama_pengeluaran');
        $tanggal_pengeluaran =  $request->input('tanggal_pengeluaran');
        $nominal_pengeluaran =  $request->input('nominal_pengeluaran');
        try{
            $simpan = Pengeluaran::where('id', $id)
            ->update(['nama_pengeluaran'=>$nama_pengeluaran,'tanggal_pengeluaran'=>$tanggal_pengeluaran,'nominal_pengeluaran'=>$nominal_pengeluaran]);
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        try{
            $simpan = Pengeluaran::where('id', $id)->delete();
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }
}
