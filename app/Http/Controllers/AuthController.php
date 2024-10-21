<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //Formualire de connexion
    public function login()
    {
        return view('auth.login');
    }

    // Faire connecter
    public function doLogin(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('shop');
        }

        return back()->withErrors([
            'email' => 'Email ou Mot de passe incorrects.'
        ])->onlyInput();
    }

    // Formulaire d'inscription
    public function register()
    {
        return view('auth.register');
    }

    // Enregistrement d'un client
    public function customRegister(Request $request)
    {
        $request->validate([
            'name' =>'required|string',
            'email' =>'required|email|unique:users',
            'telephone' =>'required|string|max:13',
            'password' =>'required|min:6',
        ]);

        $data =  $request->all();
        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
        ]);

        if ($check) {
            return redirect()->route('login')->with('success','Inscription réussie. Veuillez-vous connecter.');
        } else {
            return redirect()->route('register')->with('error', 'Echec de l\inscription.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté.');
    }
}
