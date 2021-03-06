<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login() {
        return view('login');
    }

    public function signup() {
        return view('signup');
    }

    public function loginAction() {
        $data = request() -> validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (Auth::attempt($data)) {
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signupAction() {
        $data = request() -> validate([
            "username" => "required",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ]);

        $user = User::create([
            "username" => $data["username"],
            "password" => Hash::make($data["password"]),
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function show($id) {
        $user = User::find($id);

        return view('user.show', [
            'user' => $user,
            'reviews' => $user->reviews,
        ]);

    }




}
