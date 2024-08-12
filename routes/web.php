<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PdfController;
use App\Livewire\Login;
use App\Livewire\Loginv2;
use Illuminate\Support\Facades\Route;

Route::get('/', Loginv2::class)->name('login')->middleware('guest');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', App\Livewire\Dashboard\Index::class)->name('dashboard.index');

    Route::get('/skpts', App\Livewire\Skpts\Index::class)->name('skpts.index');
    Route::get('/skpts/create', App\Livewire\Skpts\Create::class)->name('skpts.create');

    Route::get('/download/skpts/{fileName}', [PdfController::class, 'downloadSkpts'])->name('download.skpts');
    Route::get('/download/kutipan/{fileName}', [PdfController::class, 'downloadKutipan'])->name('download.kutipan');

    Route::get('/karyawan', App\Livewire\Karyawan\Index::class)->name('karyawan.index');

});