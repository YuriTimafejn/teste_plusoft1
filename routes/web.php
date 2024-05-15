<?php

use App\Http\Controllers\BookController;
use App\Models\FlagBook;
use Illuminate\Support\Facades\Route;

Route::resource('livros', BookController::class)->except('edit');
Route::get('flag/{flag}', [FlagBook::class, 'show'])->name('flag.show');


