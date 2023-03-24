<?php

use App\Http\Controllers\AcessoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

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

Route::resource('acessos', App\Http\Controllers\AcessoController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::get('/clientes/relatorios/albums', [ClienteController::class, 'albumsReport'])->name('clientes.albums_report');

// Route::resource('acessos', App\Http\Controllers\AcessoController::class);
// Route::get('/acessos', [AcessoController::class, 'index'])->name('acessos.index');
// Route::get('/acessos/create', [AcessoController::class, 'create'])->name('acessos.create');
// Route::post('/acessos', [AcessoController::class, 'store'])->name('acessos.store');
// Route::get('/acessos/{id}', [AcessoController::class, 'show'])->name('acessos.show');
// Route::get('/acessos/{id}/edit', [AcessoController::class, 'edit'])->name('acessos.edit');
// Route::put('/acessos/{id}', [AcessoController::class, 'update'])->name('acessos.update');
// Route::delete('/acessos/{id}', [AcessoController::class, 'destroy'])->name('acessos.destroy');

// Route::resource('clientes', App\Http\Controllers\ClienteController::class);
// Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
// Route::get('/clientes/create', 'ClienteController@create')->name('clientes.create');
// Route::post('/clientes', 'ClienteController@store')->name('clientes.store');
// Route::get('/clientes/{cliente}', 'ClienteController@show')->name('clientes.show');
// Route::get('/clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');
// Route::put('/clientes/{cliente}', 'ClienteController@update')->name('clientes.update');
// Route::delete('/clientes/{cliente}', 'ClienteController@destroy')->name('clientes.destroy');

// Route::get('/clientes/relatorios/albums', 'ClienteController@albumsReport')->name('clientes.albums_report');
