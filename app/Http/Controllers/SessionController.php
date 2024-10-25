<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        request()->validate([
            'first_name'=>['required'],
            'first_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required',Password::min(6),'confirmed'],
        ]);
    }
}
