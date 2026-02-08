<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function login()
    {
        
        return view('user.login');

    }
    public function index()
    {
        return view('user.index');
    }
}
