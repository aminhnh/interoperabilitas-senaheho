<?php

use App\Http\Controllers\API\DarahController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\ViewController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('darah', DarahController::class);

Route::resource('lembaga', LembagaController::class);

Route::get('home', [ViewController::class, 'index']);
