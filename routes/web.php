<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AcessoController;
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

Route::put('/users/{user}/edit',[UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}/foto',[UserController::class, 'destroy_foto'])->name('user.foto.destroy');

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

Route::view('/admin', 'layout_admin')->name('admin');

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
    Route::delete('admin/filmes/{filme}/foto',[FilmeController::class, 'destroy_foto'])->name('filmes.foto.destroy')
        ->middleware('can:update,filme');

    //Acesso
    Route::get('acesso', [AcessoController::class, 'index'])->name('acesso')
        ->middleware('can:view,App\Models\Sessoe');
    Route::get('acesso/{sessionId}', [AcessoController::class, 'access_control'])->name('acesso.control')
        ->middleware('can:view,App\Models\Sessoe');
    Route::put('acesso/{bilhete}', [AcessoController::class, 'update'])->name('acesso.acept')
        ->middleware('can:update,App\Models\Sessoe');
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

