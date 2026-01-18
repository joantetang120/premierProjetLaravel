<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showRegister(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }

     public function register(RegisterRequest $request) {
        $data = $request->validated();

       $client =  Client::create([
            "name" => $data['name'],
           "email" => $data['email'],
           "password" => Hash::make($data['password']),
        ]);

       Auth::guard('client')->login($client);

       return redirect()->route('notes.index');
    }

     public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('notes.index');
        }

        return back()->withErrors(['email' => 'Adresse mail ou mot de passe incorrect.']);
    }

    public function logout(Request $request) {
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('showlogin');
    }
}
