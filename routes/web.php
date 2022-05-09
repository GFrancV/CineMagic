<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index']);
Route::get('/filmes', [FilmeController::class, 'index']);
Route::get('/filmes/{filmeId}', [FilmeController::class, 'show_info']);

//Purchase
Route::get('/purchase/{filmeId}/{sessionId}', [PurchaseController::class, 'index']);


//Administrator routes
Route::get('admin/filmes', [FilmeController::class, 'admin_index']);

