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

Route::post('/anime/{id}/review', [ReviewController::class, 'store']);

// --------------- /review/{id}/*  individual review : show , edit , update ---------------

Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review.show');

Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');

Route::post('/review/{id}', [ReviewController::class, 'update'])->name('review.update');


//Route::post('/anime/{id}', [ReviewController::class, 'store'])->name('review.store');
//Route::post('/',[ReviewController::class, 'store'])->name('new_review');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'loginAction']);

Route::get('/signup', [UserController::class, 'signup']);

Route::post('/signup', [UserController::class, 'signupAction']);

Route::post('/signout', [UserController::class, 'logout']);

Route::post('signout', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/anime');
});



//Auth::routes();

