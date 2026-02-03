<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect()->intended('dashboard');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showLoginForm(){
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function showRegisterForm(){
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }
}
