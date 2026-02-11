<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->intended('dashboard')->with('success', "Selamat Datang");
        }

        return redirect()->back()->with('error', "Username atau password salah!");
    }

    // public function dashboard()
    // {
    //     return view('dashboard.index');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
