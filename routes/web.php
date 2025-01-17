<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/posts', [PostController::class, 'index'])
    ->middleware('ShowUserPosts')
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
//    ->middleware('checkPostOwner')
    ->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
    ->middleware('checkPostOwner')
    ->name('posts.edit');


Route::put('/posts/{id}', [PostController::class, 'update'])
    ->middleware('checkPostOwner')
    ->name('posts.update');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->middleware('checkPostOwner')
    ->name('posts.destroy');


require __DIR__.'/auth.php';

