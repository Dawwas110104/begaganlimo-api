<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'index'])->name('api.login');

Route::get('/wisata', [App\Http\Controllers\Api\WisataController::class, 'index'])->name('api.wisata.index');
Route::post('/wisata', [App\Http\Controllers\Api\WisataController::class, 'store'])->name('api.wisata.store');
Route::get('/wisata/{id}', [App\Http\Controllers\Api\WisataController::class, 'show'])->name('api.wisata.show');
Route::post('/wisata/{id}', [App\Http\Controllers\Api\WisataController::class, 'update'])->name('api.wisata.update');
Route::delete('/wisata/{id}', [App\Http\Controllers\Api\WisataController::class, 'destroy'])->name('api.wisata.destroy');

Route::get('/umkm', [App\Http\Controllers\Api\UmkmController::class, 'index'])->name('api.umkm.index');
Route::post('/umkm', [App\Http\Controllers\Api\UmkmController::class, 'store'])->name('api.umkm.store');
Route::get('/umkm/{id}', [App\Http\Controllers\Api\UmkmController::class, 'show'])->name('api.umkm.show');
Route::post('/umkm/{id}', [App\Http\Controllers\Api\UmkmController::class, 'update'])->name('api.umkm.update');
Route::delete('/umkm/{id}', [App\Http\Controllers\Api\UmkmController::class, 'destroy'])->name('api.umkm.destroy');


Route::middleware(['auth:sanctum'])->group(function () {

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
