<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){
         $clients= Client::all();
         return view('admin.dashboard', compact('clients'));

    }

    public function store(Request $request)
{
    // 1. Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,client', // On force le choix entre ces deux rôles
    ]);

    // 2. Création du client
    Client::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Client créé avec succès !');
}

        public function create()
    {
        // On retourne la vue du formulaire de création
        return view('admin.clients.create');
    }

}
