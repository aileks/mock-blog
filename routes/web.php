<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\MustBeAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware(MustBeAdmin::class)->group(fn () => [
    Route::get('admin/posts', [AdminPostController::class, 'index']),
    Route::post('admin/posts', [AdminPostController::class, 'store']),
    Route::get('admin/posts/create', [AdminPostController::class, 'create']),
    Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit']),
    Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update']),
    Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy']),
]);
