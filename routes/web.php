<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FichierController;
use App\Models\Fichier;
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

Route::get('/', function () {
    $files = Fichier::all();
    return view('home', compact('files'));
})->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/fichier/create', [FichierController::class, 'create'])->name('file.create');
Route::post('/admin/fichier/store', [FichierController::class, 'store'])->name('file.store');

Route::delete('/admin/fichier/{id}/delete', [FichierController::class, 'destroy'])->name('file.destroy');

Route::get('/admin/fichier/{id}/edit', [FichierController::class, 'edit'])->name('file.edit');
Route::put('/admin/fichier/{id}/update', [FichierController::class, 'update'])->name('file.update');