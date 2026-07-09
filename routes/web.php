<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PenerimaanBarangController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\DetailPenerimaanController;
use App\Http\Controllers\DetailSOController;
use App\Http\Controllers\LaporanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('supplier', SupplierController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('satuan', SatuanController::class);
Route::resource('produk', ProdukController::class);
Route::resource('purchase_order', PurchaseOrderController::class);
Route::resource('penerimaan_barang', PenerimaanBarangController::class);
Route::resource('sales_order', SalesOrderController::class);
Route::resource('mutasi', MutasiController::class);

Route::prefix('penerimaan/{id_penerimaan}/detail')->name('detail_penerimaan.')->group(function () {
    Route::get('/', [DetailPenerimaanController::class, 'index'])->name('index');
    Route::get('/create', [DetailPenerimaanController::class, 'create'])->name('create');
    Route::post('/', [DetailPenerimaanController::class, 'store'])->name('store');
    Route::get('/{detail}/edit', [DetailPenerimaanController::class, 'edit'])->name('edit');
    Route::put('/{detail}', [DetailPenerimaanController::class, 'update'])->name('update');
    Route::delete('/{detail}', [DetailPenerimaanController::class, 'destroy'])->name('destroy');
});

Route::prefix('sales-order/{id_so}/detail')->name('detail_so.')->group(function () {
    Route::get('/', [DetailSOController::class, 'index'])->name('index');
    Route::get('/create', [DetailSOController::class, 'create'])->name('create');
    Route::post('/', [DetailSOController::class, 'store'])->name('store');
    Route::get('/{detail}/edit', [DetailSOController::class, 'edit'])->name('edit');
    Route::put('/{detail}', [DetailSOController::class, 'update'])->name('update');
    Route::delete('/{detail}', [DetailSOController::class, 'destroy'])->name('destroy');
});

Route::prefix('laporan')->name('laporan.')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('index');
    Route::get('/purchase-order', [LaporanController::class, 'purchaseOrder'])->name('purchase_order');
    Route::get('/penerimaan-barang', [LaporanController::class, 'penerimaanBarang'])->name('penerimaan_barang');
    Route::get('/sales-order', [LaporanController::class, 'salesOrder'])->name('sales_order');
    Route::get('/mutasi', [LaporanController::class, 'mutasi'])->name('mutasi');
});
