<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

//Authentication
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::get('refresh_captcha', [AuthController::class,'refreshCaptcha'])->name('refresh_captcha');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function(){
    return view('backend.dashboard');
})->middleware(['auth', 'verified','role:Super Admin|Admin|Mentor|Peserta']);

Route::group(['prefix'=>'admin', 'middleware' => ['auth','verified','role:Super Admin|Admin|Mentor|Peserta']], function(){
    Route::resource('/home', HomeController::class);
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth','verified','role:Super Admin']], function(){
    Route::resource('/users', UserController::class);
    Route::get('/role',[RoleController::class, 'index'])->name('role.index');
    Route::get('/role/edit/{id}',[RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update',[RoleController::class, 'update'])->name('role.update');
    Route::resource('/mentor', MentorController::class);
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth','verified','role:Super Admin|Admin|Peserta']], function(){
    Route::resource('/kegiatan', KegiatanController::class);
    Route::resource('/peserta', PesertaController::class);
    Route::get('/data-peserta/create/{id}', [PesertaController::class, 'create_peserta'])->name('peserta.create_peserta');
    Route::get('/data-peserta/import',[PesertaController::class, 'import'])->name('peserta.import');
    Route::post('/data-peserta/import',[PesertaController::class, 'store_import'])->name('peserta.store_import');
});
