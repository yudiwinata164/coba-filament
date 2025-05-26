<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\HandleSlugController;
use App\Http\Controllers\Frontend\GalleryController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/{slug}', [HandleSlugController::class, 'handle'])->name('slug.handle');

Route::get('/widget', [WidgetController::class, 'index']);



