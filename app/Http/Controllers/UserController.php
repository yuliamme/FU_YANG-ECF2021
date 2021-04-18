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

//        dd($data);

        User::create([
            "username" => $data["username"],
            "password" => Hash::make($data["password"]),
        ]);

//        $user = new User();
//        $user->username = $validated["username"];
//        $user->password = Hash::make($validated["password"]);
//        $user->save();
//        Auth::login($user);

        return redirect('/');

    }

    public function logout() {
//        return view('login');
    }

    public function show($id) {

        $user = User::find($id);

        return view('user.show', [
            'user' => $user,
            'reviews' => $user->reviews,
        ]);

    }




}
