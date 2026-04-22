<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Public frontend routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/pendaftaran', [FrontendController::class, 'pendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran', [FrontendController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-status', [FrontendController::class, 'cekStatus'])->name('cek.status');
