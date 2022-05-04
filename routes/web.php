<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

// Authentication
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);

// Google authentication
Route::get('/auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// Profile
Route::post('/profile', [ProfileController::class, 'update'])->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::get('/profile/{user}', [ProfileController::class, 'index']);

// Photos
Route::get('/photos', [PhotoController::class, 'index']);
Route::post('/photos', [PhotoController::class, 'store'])->middleware('auth');
Route::get('/photos/create', [PhotoController::class, 'create'])->middleware('auth');
Route::put('/photos/{photo}', [PhotoController::class, 'update'])->middleware('auth');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->middleware('auth');
Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->middleware('auth');
