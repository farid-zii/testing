<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

});

Route::resource('dashboard/pegawai', PegawaiController::class);
Route::resource('dashboard/jabatan', JabatanController::class);
Route::resource('dashboard/user', UserController::class);
Route::resource('dashboard/kontrak', KontrakController::class);

Route::get("/",[LoginController::class,'login'])->name("login");
Route::post("login",[LoginController::class,'loginAction']);
Route::post("logout",[LoginController::class,'logout']);

