<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\PreferensiController;
use App\Http\Controllers\BobotKriteriaController;
use App\Http\Controllers\BobotKriteriaMatrixController;

Route::get('/home', function () {
    return view('main');
});

Route::get('/kriteria', function () {
    return view('kriteria');
});

Route::get('/alternatif', function () {
    return view('alternatif');
});


Route::get('/evaluasi', function () {
    return view('evaluasi');
});

Route::get('/preferensi', function () {
    return view('preferensi');
});

Route::get('/bobot-kriteria', function () {
    return view('bobot-kriteria');
});

Route::get('/bobot-kriteria-matrix', function () {
    return view('bobot-kriteria-matrix');
});

Route::resource('kriteria', KriteriaController::class);

Route::resource('alternatif', AlternatifController::class);

Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');

Route::get('/preferensi', [PreferensiController::class, 'index'])->name('preferensi.index');

Route::get('/bobot-kriteria', [BobotKriteriaController::class, 'index'])->name('bobot-kriteria.index');

Route::get('/bobot-kriteria-matrix', [BobotKriteriaMatrixController::class, 'index'])->name('bobot-kriteria-matrix.index');
