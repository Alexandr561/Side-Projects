<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return 'Test';
})->middleware(['isAdmin']);

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('posts', PostController::class)->middleware(['auth','isAdmin']);
//Route::resource('posts', PostController::class)->middleware(['auth']);
Route::resource('posts', PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

//маршруты которые какогото *** не находятся в api
Route::middleware('api')->group(function () {
    Route::get('/api/posts', [\App\Http\Controllers\ApiPostController::class, 'index']);
    Route::get('/api/posts/{post}', [\App\Http\Controllers\ApiPostController::class, 'show']);
    Route::post('/api/posts', [\App\Http\Controllers\ApiPostController::class, 'store']);
    Route::patch('/api/posts/{post}', [\App\Http\Controllers\ApiPostController::class, 'update']);
    Route::delete('/api/posts/{post}', [\App\Http\Controllers\ApiPostController::class, 'destroy']);
});

Route::get('/greeting', function () {
    return 'Hello World';
});
//Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
//Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
//Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
//Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
//Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
//Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
//Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
