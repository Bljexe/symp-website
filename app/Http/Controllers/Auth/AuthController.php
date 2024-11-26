<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'username' => 'required|string|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'client_ip' => $request->ip(),
        ]);

        return redirect()->route('index')->with('success', 'Usuario registrado com sucesso!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Credenciais inválidas!');
        }

        if (!auth()->user()->status) {
            auth()->logout();
            return back()->with('error', 'Sua conta está desativada!');
        }

        return redirect()->route('index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
