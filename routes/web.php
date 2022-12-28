<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(MatakuliahController::class)->group(function () {
    Route::get('/insert_matkul', 'insert');
    Route::get('/select_matkul', 'select');
    Route::get('/update_matkul', 'update');
    Route::get('/delete_matkul', 'delete');
});

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/insert_mhs', 'insert');
    Route::get('/select_mhs', 'select');
    Route::get('/update_mhs', 'update');
    Route::get('/delete_mhs', 'delete');
});

Route::controller(DosenController::class)->group(function () {
    Route::get('/insert_dosen', 'insert');
    Route::get('/select_dosen', 'select');
    Route::get('/update_dosen', 'update');
    Route::get('/delete_dosen', 'delete');
});



Route::get('/dosen', function () {
    $dosens = ["Venti","Rosaria","Zhongli","Diona","Zakaria","Kanari","Giorno","Heracles","Muklis","John"];
    $pelajaran = ["Bahasa Inggris","Bahasa Indonesia","Pemrograman Berbasis Web","Teknik Sastra","Artificial Intelegence","Kalkulus","Aljabar Linear","Fisika Dasar","Algoritma Pemrograman","Technoprenur"];
    return view('dosen.dosen')->with('dosens',$dosens)
    ->with('pelajaran',$pelajaran);
}
);
Route::get('/mahasiswa', function () {
    $siswas = ["Adrian Wibisono","Apip Simajudin","Stephen Hawkin","Rahmat Mejikom","Elvis Bitsu","Mamat Resing","Manuel Manuela","Harmin Maros","Losari Putraman","Willy Wonka"];
    $nim = ["20043","21893","21064","20412","21745","20934","21735","20193","20473","21632"];
    return view('mahasiswa.mahasiswa')->with('siswas',$siswas)
    ->with('nim',$nim);
}
);
Route::get('/matakuliah', function () {
    $matkuls = ["Bahasa Inggris","Bahasa Indonesia","Pemrograman Berbasis Web","Teknik Sastra","Artificial Intelegence","Kalkulus","Aljabar Linear","Fisika Dasar","Algoritma Pemrograman","Technoprenur"];
    $semester = ["1","1","3","2","4","2","1","3","2","5"];
    return view('matakuliah.matakuliah')->with('matkuls',$matkuls)
    ->with('semester',$semester);
}
);