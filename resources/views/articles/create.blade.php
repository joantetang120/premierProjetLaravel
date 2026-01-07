@extends('layout.layouts')

@section('title', 'Nouveau article')

@section('content')
    <h1>Nouveau articles</h1>

    <form action="" method="post">

        <div>
            <label for="">Titre</label>
            <input type="text" name="titre">
        </div>

        <div>
            <label for="">Contenu</label>
            <textarea name="contenu" id="" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="">Auteur</label>
            <input type="text" name="autheur">
        </div>

        <button type="submit">Creer L'article</button>
    </form>
@endsection
