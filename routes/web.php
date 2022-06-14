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

//Route::get('admin', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'layout_admin')->name('home');

    Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');


    // filmes
    Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes')
        ->middleware('can:viewAny,App\Models\Filme');
    Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit')
        ->middleware('can:view,filme');
    Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create')
        ->middleware('can:create,App\Models\Filme');
    Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store')
        ->middleware('can:create,App\Models\Filme');
    Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update')
        ->middleware('can:update,filme');
    Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy')
        ->middleware('can:delete,filme');
});
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit')->middleware('can:view,cliente');
Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create')->middleware('can:create,App\Models\Cliente');
//Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store')->middleware('can:create,App\Models\Cliente');
Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update')->middleware('can:update,cliente');
Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy')->middleware('can:delete,cliente');

Route::get('administradores/{administrador}/edit', [AdministradorController::class, 'edit'])->name('administradores.edit')->middleware('can:view,administrador');
Route::get('administradores/administrador', [AdministradorController::class, 'create'])->name('administradores.create')->middleware('can:create,App\Models\administrador');
Route::put('administradores/{administrador}', [AdministradorController::class, 'update'])->name('administradores.update')->middleware('can:update,administrador');
Route::delete('administradores/{administrador}', [AdministradorController::class, 'destroy'])->name('administradores.destroy')->middleware('can:delete,administrador');

