@extends('layout.layouts')

@section('title', 'Liste des etudiants')

@section('content')
    <h1>Etudiant du blog</h1>

    <a href="">Nouveau etudiant</a>

    @if ($students->isEmpty())
        <p>Aucun etudiant pour le moment !</p>
    @else
        <table>
            <thead>
                <tr>
                    {{-- <th>Titre</th>
                    <th>Contenu</th> --}}
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date de creations</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->nom }}</td>
                        <td>{{ $student->email }}</td>
                        {{-- <td>{{ $article->autheur }}</td> --}}
                        <td>{{ $student->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
