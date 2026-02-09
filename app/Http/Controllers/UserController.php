<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        // User::create([
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin123') {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['login_error' => 'Invalid username or password.'])->withInput();
        }
    }
}
