<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.form');
    }
    public function auth(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], 
        [
            'email.required' => 'O campo email é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
            'email.email' => 'E-mail não é válido'
        ]
    );

        if(!Auth::attempt($credenciais, $request->remember)){
            return redirect()->back()->with('erro', 'Email ou senha inválidos');
        }
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('site.index'));
    }

    public function create()
    {
        return view('login.create');
    }
}
