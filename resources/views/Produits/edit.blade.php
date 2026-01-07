@extends('layout.layouts')

@section('content')
<div class="table-container" style="max-width: 600px; margin: auto;">
    <h2>Modifier le produit : {{ $produit->nom }}</h2>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Nom :</label>
            <input type="text" name="nom" value="{{ $produit->nom }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Prix :</label>
            <input type="number" step="0.01" name="prix" value="{{ $produit->prix }}" required style="width: 100%; padding: 8px;">
        </div>


        <button type="submit" style="background: #5e72e4; color: white; border: none; padding: 10px; width: 100%; cursor: pointer;">
            Enregistrer les modifications
        </button>
    </form>
</div>
@endsection
