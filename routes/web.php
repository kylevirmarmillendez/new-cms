<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;

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
Route::get('/welcome',[WelcomeController::class,'index']);


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post');


Route::middleware('auth')->group(function(){

    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/admin/posts', [PostController::class, 'index'])->name('post.index');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/posts/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    
   
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
