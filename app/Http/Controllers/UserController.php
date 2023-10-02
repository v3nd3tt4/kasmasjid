<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $row = Pengguna::orderBy('id', 'DESC')->get();;
        $data = array(
            'link' => 'user',
            'script' => 'scriptuser'
        );
		return view('user', compact('row'))->with($data);
    }

    public function getData(Request $request){
        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }
        $id =  $request->input('id');
        $q = Pengguna::where('id', $id)->first();
        return $q->toJson();
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
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'ulangi_password' => 'required',
        ]);
        if($request->input('password') != $request->input('ulangi_password')){
            return response()->json([
                'status' => 'failed',
                'pesan' => 'Password tidak cocok'
            ]);
            exit();
        }

        $username =  $request->input('username');
        $q = Pengguna::where('username', $username)->count();
        if($q > 0){
            return response()->json([
                'status' => 'failed',
                'pesan' => 'Username sudah digunakan/ada'
            ]);
            exit();
        }

        $data = array(
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => PASSWORD_HASH($request->input('password'), PASSWORD_DEFAULT),
        );

        try{
            $simpan = Pengguna::create($data);
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
                'pesan' => 'Data gagal disimpan'
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
        $request->validate([
            'nama' => 'required',
            'id' => 'required'
        ]);
        $id = $request->input('id');
        $data = array();
        $data['nama']  = $request->input('nama');
        if(!empty($request->input('password'))){            
            if($request->input('password') != $request->input('ulangi_password')){
                return response()->json([
                    'status' => 'failed',
                    'pesan' => 'Password tidak cocok'
                ]);
                exit();
            }else{
                $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
            }
        }
        try{
            $simpan = Pengguna::where('id', $id)
            ->update($data);
            // return Response::json($simpan);
            return response()->json([
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
                'error'=> $e
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
            $simpan = Pengguna::where('id', $id)->delete();
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
