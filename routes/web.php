<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Anime;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\UserController;



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

// --------------- nav bar : home , top , watchlist , add anime ---------------

Route::get('/', function () { return redirect('/anime'); });

Route::get('/anime', [AnimeController::class, 'index'])->name('anime.index');

Route::get('/top', [AnimeController::class, 'rank'])->name('anime.rank');

Route::get('/watchlist', [UserController::class, 'watchlist'])->name('user.watchlist');

Route::get('/anime/create', [AnimeController::class, 'create'])->name('anime.create');

Route::post('/anime', [AnimeController::class, 'store'])->name('anime.store');

// --------------- /anime/{id}/*  individual anime : show , add review ---------------

Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');

Route::get('/anime/{id}/new_review', [ReviewController::class, 'create'])->name('review.create');

Route::post('/anime/{id}/review', [ReviewController::class, 'store'])->name('review.store');

// --------------- /review/{id}/*  individual review : show , edit , update , destroy ---------------

Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review.show');

Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');

Route::post('/review/{id}', [ReviewController::class, 'update'])->name('review.update');

Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

// --------------- user : show , login , signup , logout ---------------

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/login', [UserController::class, 'login'])->name('user.login');

Route::post('/login', [UserController::class, 'loginAction']);

Route::get('/signup', [UserController::class, 'signup'])->name('user.signup');

Route::post('/signup', [UserController::class, 'signupAction']);

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');;



