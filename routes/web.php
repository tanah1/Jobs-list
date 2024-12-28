<?php

use App\Http\Controllers\JopController;
use Illuminate\Support\Facades\Route;


Route::get('/jobs', [JopController::class, 'index'])->name('index');

Route::get('/jobs/create', [JopController::class, 'create'])->name('create');

Route::post('/jobs/store', [JopController::class, 'store'])->name('store');

Route::get('/jobs/{job}/edit', [JopController::class, 'edit'])->name('edit');

Route::put('/jobs/{job}/update', [JopController::class, 'update'])->name('update');

Route::delete('jobs/{id}', [JopController::class, 'destroy'])->name('destroy');