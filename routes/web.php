<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;




Route::get('/', function () {
    $data = ['nama' => 'fajar', 'foto' =>'pomnas.jpeg']; 
    return view('dashboard', compact ('data')); 
});

Route::get('/siswa', function () {
    $data = ['nama' => 'fajar', 'foto' =>'pomnas.jpeg']; 
    return view('siswa', compact ('data')); 
});

// Route::get('/kelas', function () {
//     $data = ['nama' => '', 'foto' =>'opp.jpeg'];
//     return view('kelas', compact ('data')); 
// });

Route::get('/siswa', function () {
    $data = ['nama' => 'fajar', 'foto' =>'pomnas.jpeg']; 
    return view('dashboard', compact ('data')); 
});middleware('auth');

Route::get('siswa', 'App\Http\Controllers\siswaController@index');
Route::get('kelas', 'App\Http\Controllers\kelasController@index');

Route::get('/data', [SiswaController::class, 'index']);
Route::get('/data/{id}', [SiswaController::class, 'show']);

// Route::get('/kelas', [kelasController::class, 'index']);
// Route::get('/kelas/create', [kelasController::class, 'create']);
// Route::post('/kelas', [kelasController::class, 'store']);



Route::resource('/kelas', KelasController::class)->middleware('auth');
Route::resource('/siswa', SiswaController::class)->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


