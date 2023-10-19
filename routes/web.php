<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NamaGuruController;
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
Route::middleware(['CekRole:user'])->group(function (){
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

    //dasbod admin

    Route::get('dashboard_component.bahasa_indo', [MapelController::class, 'index'])->name('bahasa_indo');

    Route::get('/user', [HomeController::class, 'dashboardUser'])->name('dashboarduser');
    Route::get('/guru', function () {
        return view('dashboard_component.guru');
    })->name('dashboardadmin');
    //dasbod user

});

Route::middleware(['CekRole:admin'])->group(function (){
Route::get('/admin', [HomeController::class, 'dashboardAdmin'])->name('dashboardguru');
Route::get('data_guru.index', [NamaGuruController::class, 'index'])->name('guru');
Route::get('data_mapel.index', [DataMapelController::class, 'index'])->name('mapel');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

