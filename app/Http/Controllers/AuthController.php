<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
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

       return redirect()->route('articles.index');
    }
}
