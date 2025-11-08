<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;


    


Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/', function(){ return redirect()->route('home'); });

Route::middleware('auth')->group(function(){
    Route::get('/home', function(){ return view('home'); })->name('home');
    Route::resource('departemen', DepartemenController::class);
    Route::resource('karyawan', KaryawanController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('departemen', DepartemenController::class);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');