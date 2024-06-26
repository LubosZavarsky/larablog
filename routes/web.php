<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home
Route::get('/', [PagesController::class, 'home'] );

// posts
Route::resource('posts', PostController::class)->name('posts.index', 'posts');
//Route::resource('posts', PostController::class)->middleware(['auth'])->name('posts.index', 'posts');
//Route::get('posts',  [PostController::class, 'index'])->name('posts');

// comments
Route::resource('comments', CommentController::class)->only([
   'store', 'edit', 'update', 'destroy'
])->middleware(['auth']);

// user profile
Route::get('/user/{id}', [UserController::class, 'show']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

