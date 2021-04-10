<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Anime;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AnimeController;


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


Route::get('/anime/{id}/new_review', function ($id) {
    $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
  return view('new_review', ["anime" => $anime]);
});
//Route::get('/anime/{id}/new_review', [ReviewController::class, 'create']);


Route::get('/login', function () {
  return view('login');
});

Route::post('/login', function (Request $request) {
  $validated = $request->validate([
    "username" => "required",
    "password" => "required",
  ]);
  if (Auth::attempt($validated)) {
    return redirect()->intended('/');
  }
  return back()->withErrors([
    'username' => 'The provided credentials do not match our records.',
  ]);
});

Route::get('/signup', function () {
  return view('signup');
});

Route::post('signup', function (Request $request) {
  $validated = $request->validate([
    "username" => "required",
    "password" => "required",
    "password_confirmation" => "required|same:password"
  ]);
  $user = new User();
  $user->username = $validated["username"];
  $user->password = Hash::make($validated["password"]);
  $user->save();
  Auth::login($user);

  return redirect('/');
});

Route::post('signout', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
});
