<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MundurejoController;
use App\Http\Controllers\SidomekarController;
use App\Http\Controllers\PondokjoyoController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(PondokjoyoController::class)->group(function () {
    Route::post('/pondokjoyo/cek', 'cek_nominatif')->name('cek-pondokjoyo');
    Route::get('/pondokjoyo', 'index')->name('pondokjoyo.index');
    Route::get('/pondokjoyo/create', 'create')->name('create-pondokjoyo');
    Route::post('/pondokjoyo/store', 'store');
    Route::get('/pondokjoyo/{id}/destroy', 'destroy')->name('destroy-pondokjoyo');
    Route::get('/pondokjoyo/{id}/edit', 'edit')->name('edit-pondokjoyo');
});

Route::controller(MundurejoController::class)->group(function () {
    Route::post('/mundurejo/cek', 'cek_nominatif')->name('cek-mundurejo');
    Route::get('/mundurejo', 'index')->name('mundurejo.index');
    Route::get('/mundurejo/create', 'create')->name('create-mundurejo');
    Route::post('/mundurejo/store', 'store');
    Route::get('/mundurejo/{id}/destroy', 'destroy')->name('destroy-mundurejo');
    Route::get('/mundurejo/{id}/edit', 'edit')->name('edit-mundurejo');
});

Route::controller(SidomekarController::class)->group(function () {
    Route::post('/sidomekar/cek', 'cek_nominatif')->name('cek-sidomekar');
    Route::get('/sidomekar', 'index')->name('sidomekar.index');
    Route::get('/sidomekar/create', 'create')->name('create-sidomekar');
    Route::post('/sidomekar/store', 'store');
    Route::get('/sidomekar/{id}/destroy', 'destroy')->name('destroy-sidomekar');
    Route::get('/sidomekar/{id}/edit', 'edit')->name('edit-sidomekar');
});

Route::controller(DownloadController::class)->group(function () {
    Route::get('/downloadpondokjoyo', 'downloadExcelPondokjoyo')->name('downloadExcelPondokjoyo');
    Route::get('/downloadmundurejo', 'downloadExcelMundurejo')->name('downloadExcelMundurejo');
    Route::get('/downloadsidomekar', 'downloadExcelSidomekar')->name('downloadExcelSidomekar');
    Route::get('/mundurejo/{id}/export', 'exportMundurejo')->name('export-mundurejo');
    Route::get('/pondokjoyo/{id}/export', 'exportPondokjoyo')->name('export-pondokjoyo');
    Route::get('/sidomekar/{id}/export', 'exportSidomekar')->name('export-sidomekar');
});
