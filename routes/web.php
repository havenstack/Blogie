<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
   |--------------------------------------------------------------------------
   | Frontend Routes
   |--------------------------------------------------------------------------
*/
Route::get('/{all?}', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/post/{post}', [BlogController::class, 'post'])->name('blog.post');
Route::get('blog/contact', [BlogController::class, 'contact'])->name('blog.contact');


/*
   |--------------------------------------------------------------------------
   | Backend Routes
   |--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post CRUD
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::patch('/posts', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/delete', [PostController::class, 'delete'])->name('posts.delete');
});

/*
   |--------------------------------------------------------------------------
   | Auth Routes
   |--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
