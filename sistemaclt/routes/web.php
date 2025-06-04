<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadController;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('especialidades', EspecialidadController::class)->except(['create', 'show']);
/*Route::get('/especialidades/{id}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');*/
Route::post('especialidades/{id}/toggle', [EspecialidadController::class, 'toggle'])->name('especialidades.toggle');




/*
Route::resource(name: 'especialidades', EspecialidadController::class);
Route::post('especialidades/{id}/activar', [EspecialidadController::class, 'activar'])->name('especialidades.activar');
Route::post('especialidades/{id}/desactivar', [EspecialidadController::class, 'desactivar'])->name('especialidades.desactivar');

*/