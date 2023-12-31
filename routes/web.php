<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\DataMapelController;
use App\Http\Controllers\KomentarAdminController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\NamaGuruController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Auth;


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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['CekRole:user'])->group(function (){
    //buat anu, ulasan
    Route::resource('komentar', KomentarController::class);
    //buat serach
    Route::get('/tugas/search', [TugasController::class, 'search'])->name('tugas.search');


    Route::get('/',[PageController::class,'home'])->name('home');
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
     // Tugas Routes
     Route::get('/tugas', [TugasController::class,'index'])->name('tugas.index');
     Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
     Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
     Route::get('/tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');
     Route::get('/tugas/{tugas}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
     Route::put('/tugas/{tugas}', [TugasController::class, 'update'])->name('tugas.update');
     Route::put('/tugas/{tugas}', [TugasController::class, 'updates'])->name('tugas.updates');
     Route::delete('/tugas/{tugas}', [TugasController::class. 'destroy'])->name('tugas.destroy');
    Route::get('/user', [HomeController::class, 'dashboardUser'])->name('dashboarduser')->middleware('verified');
    Route::get('/guru', function () {
        return view('dashboard_component.guru');
    })->name('dashboardadmin');

});

Route::middleware(['CekRole:admin'])->group(function (){
Route::get('/admin', [HomeController::class, 'dashboardAdmin'])->name('dashboardguru');


//gurunama
Route::get('/guru', [NamaGuruController::class, 'index'])->name('guru.index');
Route::get('/guru/create', [NamaGuruController::class, 'create'])->name('guru.create');
Route::post('/guru', [NamaGuruController::class, 'store'])->name('guru.store');
Route::get('/guru/{nama_guru}', [NamaGuruController::class, 'show'])->name('guru.show');
Route::get('/guru/{nama_guru}/edit', [NamaGuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{nama_guru}', [NamaGuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}', [NamaGuruController::class, 'destroy'])->name('guru.destroy');
Route::get('data_mapel.index', [DataMapelController::class, 'index'])->name('mapel');
Route::get('mapelIndonesia', [DataMapelController::class, 'mapelIndonesia'])->name('mapelIndonesia');
Route::get('mapelAgama', [DataMapelController::class, 'mapelAgama'])->name('mapelAgama');
Route::get('mapelMatematika', [DataMapelController::class, 'mapelMatematika'])->name('mapelMatematika');

//ini untuk aprooval
Route::put('tugas/update/{id}', [TugasController::class, 'update']);
Route::put('tugas/tolak/{id}', [TugasController::class, 'tolak']);

// Rute untuk Data Mapel
Route::get('/mapel', [DataMapelController::class, 'index'])->name('mapel.index');
Route::get('/mapel/create', [DataMapelController::class, 'create'])->name('mapel.create');
Route::post('/mapel', [DataMapelController::class, 'store'])->name('mapel.store');
Route::get('/mapel/{id_mapel}', [DataMapelController::class, 'show'])->name('mapel.show');
Route::get('/mapel/{id_mapel}/edit', [DataMapelController::class, 'edit'])->name('mapel.edit');
Route::put('/mapel/{id_mapel}', [DataMapelController::class, 'update'])->name('mapel.update');
Route::delete('/mapel/{id}', [DataMapelController::class, 'destroy'])->name('mapel.destroy');

//untuk komentar
Route::resource('komentaradmin', KomentarAdminController::class);


});






