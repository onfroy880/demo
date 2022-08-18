<?php

use App\Http\Controllers\MainControllers;
use Illuminate\Support\Facades\Route;


/********************************************************** - Route de l'application - *******************************************************/
Route::get('/', [MainControllers::class, 'index'])->name('index');
Route::post('/save product', [MainControllers::class, 'save'])->name('save');
Route::post('/delete', [MainControllers::class, 'delete'])->name('delete');
Route::post('/update', [MainControllers::class, 'update'])->name('update');
Route::post('/update check', [MainControllers::class, 'check'])->name('check');
