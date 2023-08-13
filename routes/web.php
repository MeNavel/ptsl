<?php

use App\Http\Controllers\DataKoordinatorController;
use App\Http\Controllers\SidomulyoController;
use App\Http\Controllers\SidorejoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MundurejoController;
use App\Http\Controllers\SidomekarController;
use App\Http\Controllers\PondokjoyoController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\SumberagungController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(SidomulyoController::class)->group(function () {
    Route::post('/sidomulyo/cek', 'cek_nominatif')->name('cek-sidomulyo');
    Route::get('/sidomulyo', 'index')->name('sidomulyo.index');
    Route::get('/sidomulyo/create', 'create')->name('create-sidomulyo');
    Route::post('/sidomulyo/store', 'store');
    Route::get('/sidomulyo/{id}/destroy', 'destroy')->name('destroy-sidomulyo');
    Route::get('/sidomulyo/{id}/edit', 'edit')->name('edit-sidomulyo');
    Route::get('/sidomulyo/showupdatebpn', 'showupdatebpn')->name('showupdatebpn_sidomulyo');
    Route::post('/sidomulyo/updatebpn', 'updatebpn')->name('updatebpn_sidomulyo');
});

Route::controller(SidorejoController::class)->group(function () {
    Route::post('/sidorejo/cek', 'cek_nominatif')->name('cek-sidorejo');
    Route::get('/sidorejo', 'index')->name('sidorejo.index');
    Route::get('/sidorejo/create', 'create')->name('create-sidorejo');
    Route::post('/sidorejo/store', 'store');
    Route::get('/sidorejo/{id}/destroy', 'destroy')->name('destroy-sidorejo');
    Route::get('/sidorejo/{id}/edit', 'edit')->name('edit-sidorejo');
    Route::get('/sidorejo/showupdatebpn', 'showupdatebpn')->name('showupdatebpn_sidorejo');
    Route::post('/sidorejo/updatebpn', 'updatebpn')->name('updatebpn_sidorejo');
});

Route::controller(PondokjoyoController::class)->group(function () {
    Route::post('/pondokjoyo/cek', 'cek_nominatif')->name('cek-pondokjoyo');
    Route::get('/pondokjoyo', 'index')->name('pondokjoyo.index');
    Route::get('/pondokjoyo/create', 'create')->name('create-pondokjoyo');
    Route::post('/pondokjoyo/store', 'store');
    Route::get('/pondokjoyo/{id}/destroy', 'destroy')->name('destroy-pondokjoyo');
    Route::get('/pondokjoyo/{id}/edit', 'edit')->name('edit-pondokjoyo');
    Route::get('/pondokjoyo/showupdatebpn', 'showupdatebpn')->name('showupdatebpn_pondokjoyo');
    Route::post('/pondokjoyo/updatebpn', 'updatebpn')->name('updatebpn_pondokjoyo');
});

Route::controller(MundurejoController::class)->group(function () {
    Route::post('/mundurejo/cek', 'cek_nominatif')->name('cek-mundurejo');
    Route::get('/mundurejo', 'index')->name('mundurejo.index');
    Route::get('/mundurejo/create', 'create')->name('create-mundurejo');
    Route::post('/mundurejo/store', 'store');
    Route::get('/mundurejo/{id}/destroy', 'destroy')->name('destroy-mundurejo');
    Route::get('/mundurejo/{id}/edit', 'edit')->name('edit-mundurejo');
    Route::get('/mundurejo/showupdatebpn', 'showupdatebpn')->name('showupdatebpn_mundurejo');
    Route::post('/mundurejo/updatebpn', 'updatebpn')->name('updatebpn_mundurejo');
});

Route::controller(SidomekarController::class)->group(function () {
    Route::post('/sidomekar/cek', 'cek_nominatif')->name('cek-sidomekar');
    Route::get('/sidomekar', 'index')->name('sidomekar.index');
    Route::get('/sidomekar/create', 'create')->name('create-sidomekar');
    Route::post('/sidomekar/store', 'store');
    Route::get('/sidomekar/{id}/destroy', 'destroy')->name('destroy-sidomekar');
    Route::get('/sidomekar/{id}/edit', 'edit')->name('edit-sidomekar');
});

Route::controller(SumberagungController::class)->group(function () {
    Route::post('/sumberagung/cek', 'cek_nominatif')->name('cek-sumberagung');
    Route::get('/sumberagung', 'index')->name('sumberagung.index');
    Route::get('/sumberagung/create', 'create')->name('create-sumberagung');
    Route::post('/sumberagung/store', 'store');
    Route::get('/sumberagung/{id}/destroy', 'destroy')->name('destroy-sumberagung');
    Route::get('/sumberagung/{id}/edit', 'edit')->name('edit-sumberagung');
});

Route::controller(KoordinatorController::class)->group(function () {
    Route::post('/koordinator/cek', 'cek_koordinator')->name('cek-koordinator');
    Route::get('/koordinator', 'index')->name('koordinator.index');
    Route::get('/koordinator/create', 'create')->name('create-koordinator');
    Route::post('/koordinator/store', 'store');
    Route::get('/koordinator/{id}/destroy', 'destroy')->name('destroy-koordinator');
    Route::get('/koordinator/{id}/edit', 'edit')->name('edit-koordinator');
    Route::post('/koordinator/{id}/update', 'update')->name('update-koordinator');
});

Route::controller(DownloadController::class)->group(function () {
    Route::get('/downloadpondokjoyo', 'downloadExcelPondokjoyo')->name('downloadExcelPondokjoyo');
    Route::get('/downloadmundurejo', 'downloadExcelMundurejo')->name('downloadExcelMundurejo');
    Route::get('/downloadsumberagung', 'downloadExcelSumberagung')->name('downloadExcelSumberagung');
    Route::get('/downloadsidomekar', 'downloadExcelSidomekar')->name('downloadExcelSidomekar');
    Route::get('/downloadsidorejo', 'downloadExcelsidorejo')->name('downloadExcelsidorejo');
    Route::get('/downloadsidomulyo', 'downloadExcelsidomulyo')->name('downloadExcelsidomulyo');
    Route::get('/sidorejo/{id}/export', 'exportsidorejo')->name('export-sidorejo');
    Route::get('/sidomulyo/{id}/export', 'exportsidomulyo')->name('export-sidomulyo');
    Route::get('/mundurejo/{id}/export', 'exportMundurejo')->name('export-mundurejo');
    Route::get('/pondokjoyo/{id}/export', 'exportPondokjoyo')->name('export-pondokjoyo');
    Route::get('/sidomekar/{id}/export', 'exportSidomekar')->name('export-sidomekar');
    Route::get('/sumberagung/{id}/export', 'exportSumberagung')->name('export-sumberagung');
});

Route::controller(DataKoordinatorController::class)->group(function () {
    Route::get('/downloadmundurejokoordinator', 'dataKoordinatorMundurejo')->name('downloadDataKoordinatorMundurejo');
    Route::get('/downloadpondokjoyokoordinator', 'dataKoordinatorPondokjoyo')->name('downloadDataKoordinatorPondokjoyo');
    Route::get('/downloadsidorejokoordinator', 'dataKoordinatorSidorejo')->name('downloadDataKoordinatorSidorejo');
    Route::get('/downloadsidomulyokoordinator', 'dataKoordinatorSidomulyo')->name('downloadDataKoordinatorSidomulyo');
});
