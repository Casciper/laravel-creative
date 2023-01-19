<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'main'])->name('main');
Route::get('/posts', [PagesController::class, 'posts'])->name('posts');


