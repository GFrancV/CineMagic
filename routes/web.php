<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ReciboController;
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

//Films
Route::get('/', [PageController::class, 'index']);
Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');
Route::get('/filmes/{filmeId}', [FilmeController::class, 'show_info']);

//User
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');

//Purchase
Route::get('/purchase/{filmeId}/{sessionId}', [PurchaseController::class, 'index'])->name('purchase.index');



//Recibo
Route::post('/recibo',  [ReciboController::class, 'store'])->name('recibo.store');

//Test
Route::get('/test/', [PurchaseController::class, 'draw']);
//Route::view('/admin', 'layout_admin');


//Route::get('/admin', function () {return view('layout_admin');})->name('layout_admin');
Route::view('/admin', 'layout_admin')->name('admin');

//Administrator routes
Route::get('admin/filmes', [FilmeController::class, 'admin_index']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


