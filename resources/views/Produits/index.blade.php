@extends('layout.layouts')

@section('title', 'Liste des Produits')

@section('content')



@section('styles')
<style>
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px 8px 0 0;
        overflow: hidden;
    }

    .styled-table thead tr {
        background-color: #005bb5;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    /* Couleur de ligne alternée */
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    /* Ligne de fin */
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #005bb5;
    }

    /* Effet au survol de la souris */
    .styled-table tbody tr:hover {
        background-color: #f1f7ff;
        transition: 0.3s;
    }

    .badge-quantite {
        background: #e1e1e1;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<h1>Produits disponibles</h1>


    <table class="styled-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td><strong>{{ $produit->nom }}</strong></td>
                    <td>{{ $produit->categorie }}</td>
                    <td><span class="badge-quantite">{{ $produit->quantite }}</span></td>
                    <td>{{ number_format($produit->prix, 2, ',', ' ') }} FCFA</td>
                    <td>
    <a href="{{ route('produits.edit', $produit->id) }}" style="color: #5e72e4; text-decoration: none; margin-right: 10px;">Modifier</a>

    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer ce produit ?')">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: #f5365c; border: none; background: none; cursor: pointer; padding: 0;">Supprimer</button>
    </form>
</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('produits.create') }}"style="color: #005bb5; border: none; background: none; cursor: pointer;background: #e1e1e1;
        padding: 6px 10px;
        border-radius: 4px; text-decoration: none"> + Ajouter un produit</a>
@endsection


