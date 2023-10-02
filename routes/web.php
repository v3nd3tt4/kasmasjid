<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
});

Route::post('login/auth', [LoginController::class, 'authenticate']);
Route::post('login/logout', [LoginController::class, 'logout']);

// Route::get('/profil', function(){
//     return view('blank')->with('link', 'profil');  
// });

Route::post('pemasukan/getdata', [PemasukanController::class, 'getData']);
Route::post('pemasukan/gettoken', [PemasukanController::class, 'getToken']);
Route::post('pemasukan/update', [PemasukanController::class, 'update']);
Route::post('pemasukan/destroy', [PemasukanController::class, 'destroy']);

Route::post('pengeluaran/getdata', [PengeluaranController::class, 'getData']);
Route::post('pengeluaran/gettoken', [PengeluaranController::class, 'getToken']);
Route::post('pengeluaran/update', [PengeluaranController::class, 'update']);
Route::post('pengeluaran/destroy', [PengeluaranController::class, 'destroy']);

Route::post('user/getdata', [UserController::class, 'getData']);
Route::post('user/gettoken', [UserController::class, 'getToken']);
Route::post('user/update', [UserController::class, 'update']);
Route::post('user/destroy', [UserController::class, 'destroy']);

Route::resource('profil', DashboardController::class);

Route::resource('pemasukan', PemasukanController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('user', UserController::class);
Route::resource('halamanutama', HomeController::class);

Route::resource('companies', CompanyController::class);
