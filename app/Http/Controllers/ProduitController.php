<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        // $produits = Produit::get();
        $produits = Produit::latest()->get();
        return view('produits.index', compact('produits'));

    }
    public function create() {
    return view('produits.create');
}

public function store(Request $request) {
    // 1. Validation des données
    $validated = $request->validate([
        'nom' => 'required|max:255',
        'categorie' => 'required',
        'quantite' => 'required|integer',
        'prix' => 'required|numeric',
    ]);

    // 2. Création dans la base de données
    Produit::create($validated);

    // 3. Redirection vers la liste avec un message de succès
    return redirect()->route('Produits.index')->with('success', 'Produit ajouté avec succès!');
}
// Affiche le formulaire avec les données actuelles
public function edit($id) {
    $produit = Produit::findOrFail($id);
    return view('produits.edit', compact('produit'));
}

// Mise à jour des données dans la BD
public function update(Request $request, $id) {
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'categorie' => 'required|string',
        'quantite' => 'required|integer|min:0',
        'prix' => 'required|numeric|min:0',
    ]);

    $produit = Produit::findOrFail($id);
    $produit->update($validated);

    return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès !');
}

// Supprime le produit
public function destroy($id) {
    Produit::findOrFail($id)->delete();
    return redirect()->route('articles.index')->with('success', 'Produit supprimé !');
}
}
