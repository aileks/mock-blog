<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function store()
    {
        User::create(request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
        ]));

        return redirect('/');
    }

    public function create()
    {
        return view('register.create');
    }
}
