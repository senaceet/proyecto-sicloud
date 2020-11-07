<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

// Route::get('inicio',[LandingController::class, 'index'])->name('Landing.index');

// rutas del nav
Route::get('inicio', [LandingController::class, 'inicio'])->name('welcome');
Route::get('contacto', [LandingController::class, 'contacto'])->name('landing.contacto');
Route::get('quienes-somos', [LandingController::class, 'somos'])->name('landing.somos');
Route::get( 'mision', [LandingController::class, 'mision'])->name('landing.mision');

// ROl ADMIN
Route::get('inicio-administrador', [AdminController::class, 'iniAdmin'])->name('admin.iniAmin');
Route::get('control-usuarios', [AdminController::class, 'controlUsuarios'])->name('admin.controlUsuarios');

