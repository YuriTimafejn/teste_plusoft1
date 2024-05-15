<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FlagBookController;
use App\Models\FlagBook;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::post('/', [BookController::class, 'store'])->name('books.store');
Route::post('/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/flag/{flag}', [FlagBookController::class, 'flag'])->name('flag.flag');



