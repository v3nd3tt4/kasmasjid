<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemasukanController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
		$row = Pemasukan::orderBy('id', 'DESC')->get();;
        $data = array(
            'link' => 'pemasukan',
            'script' => 'script'
        );
		return view('pemasukan', compact('row'))->with($data);
	}

    public function getData(Request $request){
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        $q = Pemasukan::where('id', $id)->first();
        return $q->toJson();
    }

    public function getToken(Request $request){
        $csrf = csrf_token();
        return response()->json($csrf);
    }

	public function create(Request $request)
    {
        
    }

    public function edit($customer, Request $request)
    {
        
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $request->validate([
            'nama_pemasukan' => 'required',
            'nominal_pemasukan' => 'required',
            'tanggal_pemasukan' => 'required',
        ]);
        try{
            $simpan = Pemasukan::create($request->all());
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

    public function update(Request $request)
    {
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        $nama_pemasukan =  $request->input('nama_pemasukan');
        $tanggal_pemasukan =  $request->input('tanggal_pemasukan');
        $nominal_pemasukan =  $request->input('nominal_pemasukan');
        try{
            $simpan = Pemasukan::where('id', $id)
            ->update(['nama_pemasukan'=>$nama_pemasukan,'tanggal_pemasukan'=>$tanggal_pemasukan,'nominal_pemasukan'=>$nominal_pemasukan]);
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

    public function destroy(Request $request)
    {   
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        try{
            $simpan = Pemasukan::where('id', $id)->delete();
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
