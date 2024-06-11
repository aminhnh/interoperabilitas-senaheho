<?php

use App\Http\Controllers\API\DarahController;
use App\Http\Controllers\API\LembagaController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KecamatanController;
use App\Http\Controllers\API\KelurahanController;
use App\Http\Controllers\API\KotaController;
use App\Http\Controllers\API\ProvinsiController;
use App\Http\Controllers\API\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('darah', DarahController::class);
    Route::resource('lembaga', LembagaController::class);
    Route::get('provinsi', [ProvinsiController::class, 'index']);
    Route::get('kota', [KotaController::class, 'index']);
    Route::get('kelurahan', [KelurahanController::class, 'index']);
    Route::get('kecamatan', [KecamatanController::class, 'index']);
});
