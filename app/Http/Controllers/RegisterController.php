<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        if ($request->tryToRegister())
            return to_route('dashboard');

        return back()->with(['message' => 'Registration failed']);
    }
}
