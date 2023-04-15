<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\RegisterController;

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

//Auth && Register
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'store'])->name('login/store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register/store');

Route::get('/logout', [LogoutController::class, 'store'])->middleware('auth')->name('logout');


//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');



//Post
Route::get('/posts/create', [PostController::class, 'index'])->middleware('auth')->name('posts/create');
Route::post('/posts/store', [PostController::class, 'store'])->middleware('auth')->name('posts/store');
Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('posts/destroy');
Route::get('/{user:username}/{post:url}', [PostController::class, 'show'])->name('posts/show');

//Like
// Route::post('/{user:username}/{post:url}', [LikeController::class, 'store'])->name('likes/store');


//Perfil
Route::get('/{user:username}', [PerfilController::class, 'index'])->name('perfil');
