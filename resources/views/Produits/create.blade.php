@extends('layout.layouts')

@section('content')
<div class="table-container" style="max-width: 600px; margin: auto;">
    <h2>Ajouter un nouveau produit</h2>

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf {{-- INDISPENSABLE : Sécurité Laravel contre les attaques CSRF --}}

        <div style="margin-bottom: 15px;">
            <label>Nom du produit :</label><br>
            <input type="text" name="nom" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Catégorie :</label><br>
            <select name="categorie" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd;">
                <option value="Électronique">Électronique</option>
                <option value="Mode">Mode</option>
                <option value="Maison">Maison</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Quantité :</label><br>
            <input type="number" name="quantite" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Prix :</label><br>
            <input type="number" step="0.01" name="prix" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd;">
        </div>

        <button type="submit" style="background: #2dce89; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%;">
            Enregistrer le produit
        </button>
    </form>
</div>
@endsection
