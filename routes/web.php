<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
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
    return view('welcome');
});
Route::get('/index', [PostsController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class,'create'])->name('posts.create');
Route::post('/posts/store', [PostsController::class,'store'])->name('posts.store');
Route::get('/posts/{post}', [PostsController::class,'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostsController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostsController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostsController::class,'destroy'])->name('posts.destroy');


Route::get('/users/login', [UsersController::class,'login'])->name('users.login');
Route::get('/users/test', [UsersController::class,'test'])->name('users.test');
Route::post('/users/findUser', [UsersController::class,'findUser'])->name('users.findUser');

Route::get('/users/create', [UsersController::class,'create'])->name('users.create');
Route::post('/users/store', [UsersController::class,'store'])->name('users.store');

Route::get('/users/logout', [UsersController::class,'logout'])->name('users.logout');
Route::get('/users/{user}', [UsersController::class,'index'])->name('users.index');