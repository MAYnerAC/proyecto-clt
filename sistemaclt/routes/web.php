<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Especialidades
    Route::resource('especialidades', EspecialidadController::class)->except(['create', 'show']);
    /*Route::get('/especialidades/{id}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');*/
    Route::post('especialidades/{id}/toggle', [EspecialidadController::class, 'toggle'])->name('especialidades.toggle');
    //
});

require __DIR__ . '/auth.php';


/*
Route::resource(name: 'especialidades', EspecialidadController::class);
Route::post('especialidades/{id}/activar', [EspecialidadController::class, 'activar'])->name('especialidades.activar');
Route::post('especialidades/{id}/desactivar', [EspecialidadController::class, 'desactivar'])->name('especialidades.desactivar');

*/