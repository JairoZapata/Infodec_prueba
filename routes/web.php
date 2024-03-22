<?php

use App\Http\Controllers\NotasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('notas.index');
});

Route::get('/notas/index', [NotasController::class, 'index'])->name('notas.index');
Route::get('/notas/create', [NotasController::class, 'create'])->name('notas.create');
Route::post('/notas/store', [NotasController::class, 'store'])->name('notas.store');
Route::get('/notas/{id}', [NotasController::class, 'destroy'])->name('notas.destroy');
