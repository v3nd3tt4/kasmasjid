<?php

namespace App\Http\Controllers;

use App\Models\Tb_profil_masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Closure;

class DashboardController extends Controller
{
    protected $nama;

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
            // if (empty(Auth::user()->nama)) {
            //     echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            //     echo '<script>window.location.href = "'.url('login').'";</script>';
            //     exit();
            // }
            // abort(403);
        // });
    }
    public function index(){     

        if (!Auth::check()) {
            echo '<script>alert("Silahkan login terlebih dahulu")</script>';
            echo '<script>window.location.href = "'.url('login').'";</script>';
            exit();
        }

		$tb_profil_masjid = Tb_profil_masjid::first();
        $data = array(
            'link' => 'profil'
        );
		return view('blank', compact('tb_profil_masjid'))->with($data);
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
            'nama_masjid' => 'required',
            'alamat_masjid' => 'required',
        ]);
        Tb_profil_masjid::truncate();
        Tb_profil_masjid::create($request->all());

        return redirect()->route('profil.index')->with('success', 'Product created successfully.');
    }

    public function update($customer, Request $request)
    {
        
        
    }

    public function destroy($customer, Request $request)
    {
        
    }
}
