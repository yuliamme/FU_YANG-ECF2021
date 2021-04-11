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


Route::get('/', [AnimeController::class, 'index'])->name('anime.index');

Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');

Route::get('/anime/{id}/new_review', [ReviewController::class, 'create'])->name('review.create');

//Route::post('/anime/{id}', [ReviewController::class, 'store'])->name('review.store');
Route::post('/',[ReviewController::class, 'store'])->name('new_review');



Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/top', [AnimeController::class, 'rank'])->name('anime.rank');



Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'loginAction']);

Route::get('/signup', [UserController::class, 'signup']);

Route::post('/signup', [UserController::class, 'signupAction']);



Route::post('/signout', [UserController::class, 'logout']);




Route::post('signout', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
});



//Auth::routes();

