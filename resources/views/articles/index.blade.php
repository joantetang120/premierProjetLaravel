@extends('layout.layouts')

@section('title', 'Liste des articles')

@section('content')
    <h1>Articles du blog</h1>

    <a href=""> + Nouvel article</a>

    @if ($articles->isEmpty())
        <p>Aucun article pour le moment !</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Date de creations</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->titre }}</td>
                        <td>{{ $article->contenu }}</td>
                        <td>{{ $article->autheur }}</td>
                        <td>{{ $article->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
