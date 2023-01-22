<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class])->name('main');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('posts.index');
    Route::get('/posts/create', 'CreateController')->name('posts.create');
    Route::post('/posts', 'StoreController')->name('posts.store');
    Route::get('/posts/{id}', 'ShowController')->name('posts.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('posts.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('posts.update');
    Route::delete('/posts/{post}', 'DeleteController')->name('posts.destroy');
});


