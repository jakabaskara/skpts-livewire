<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Login;
use App\Livewire\Loginv2;
use Illuminate\Support\Facades\Route;

Route::get('/', Loginv2::class)->name('login')->middleware('guest');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', App\Livewire\Dashboard\Index::class)->name('dashboard.index');

    Route::get('/skpts', App\Livewire\Sktps\Index::class)->name('skpts.index');
});