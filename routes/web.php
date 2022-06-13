<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\BilheteController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HistoricoController;

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

//Films
Route::get('/', [PageController::class, 'index']);
Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');
Route::get('/filmes/{filmeId}', [FilmeController::class, 'show_info']);

//User
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');

//Purchase
Route::get('/purchase/{filmeId}/{sessionId}', [PurchaseController::class, 'index'])->name('purchase.index');

//Bilhete
Route::get('/bilhete/{idBilhete}', [BilheteController::class, 'index'])->name('bilhete.index');
Route::get('/bilhete/{idBilhete}/pdf', [BilheteController::class, 'pdf'])->name('bilhete.pdf');

//Recibo
Route::get('/recibo/{reciboId}', [ReciboController::class, 'index'])->name('recibo.index');
Route::get('/recibo/{reciboId}/pdf', [ReciboController::class, 'pdf'])->name('recibo.pdf');
Route::get('/recibo/{reciboId}/download', [ReciboController::class, 'download'])->name('recibo.pdf');
Route::post('/recibo',  [ReciboController::class, 'store'])->name('recibo.store');

//Historico
Route::get('/historico/recibos',  [HistoricoController::class, 'recibos'])->name('historico.recibos');
Route::get('/historico/bilhetes',  [HistoricoController::class, 'bilhetes'])->name('historico.bilhetes');


//Test
Route::get('/test/', [PurchaseController::class, 'draw']);
//Route::view('/admin', 'layout_admin');


//Route::get('/admin', function () {return view('layout_admin');})->name('layout_admin');
Route::view('/admin', 'layout_admin')->name('admin');

//Administrator routes
Route::get('admin/filmes', [FilmeController::class, 'admin_index']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


