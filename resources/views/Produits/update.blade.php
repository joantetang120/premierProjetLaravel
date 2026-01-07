@extends('layout.layouts')

@section('content')
<div class="table-container" style="max-width: 600px; margin: 50px auto; padding: 30px; background: white; border-radius: 12px; shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <h2 style="color: #32325d; margin-bottom: 25px; border-bottom: 2px solid #f6f9fc; padding-bottom: 10px;">
        Modifier le produit : <span style="color: #5e72e4;">{{ $produit->nom }}</span>
    </h2>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #525f7f;">Nom du produit</label>
            <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" required
                   style="width: 100%; padding: 12px; border: 1px solid #dee2e6; border-radius: 8px; font-size: 16px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #525f7f;">Catégorie</label>
            <select name="categorie" required
                    style="width: 100%; padding: 12px; border: 1px solid #dee2e6; border-radius: 8px; background: white; font-size: 16px;">
                <option value="Électronique" {{ (old('categorie', $produit->categorie) == 'Électronique') ? 'selected' : '' }}>Électronique</option>
                <option value="Mode" {{ (old('categorie', $produit->categorie) == 'Mode') ? 'selected' : '' }}>Mode</option>
                <option value="Maison" {{ (old('categorie', $produit->categorie) == 'Maison') ? 'selected' : '' }}>Maison</option>
                <option value="Alimentation" {{ (old('categorie', $produit->categorie) == 'Alimentation') ? 'selected' : '' }}>Alimentation</option>
            </select>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 30px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #525f7f;">Stock (Quantité)</label>
                <input type="number" name="quantite" value="{{ old('quantite', $produit->quantite) }}" required
                       style="width: 100%; padding: 12px; border: 1px solid #dee2e6; border-radius: 8px; font-size: 16px;">
            </div>

            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #525f7f;">Prix (€)</label>
                <input type="number" step="0.01" name="prix" value="{{ old('prix', $produit->prix) }}" required
                       style="width: 100%; padding: 12px; border: 1px solid #dee2e6; border-radius: 8px; font-size: 16px;">
            </div>
        </div>

        <div style="display: flex; gap: 15px;">
            <button type="submit" style="flex: 2; background: #5e72e4; color: white; border: none; padding: 14px; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 16px; transition: background 0.3s;">
                Mettre à jour le produit
            </button>
            <a href="{{ route('produits.index') }}" style="flex: 1; text-align: center; background: #f4f5f7; color: #32325d; text-decoration: none; padding: 14px; border-radius: 8px; font-weight: bold; font-size: 16px;">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
