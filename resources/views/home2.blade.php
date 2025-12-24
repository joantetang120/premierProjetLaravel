@extends("layout.layouts");

@section('styles')

@endsection

@section('content')

    <section>
        <h2>Bienvemnu sur la page d'acceuil</h2>
        <p>this is a simple html and css template to start your project</p>
        <h2>nom: {{$nom}}</h2>
        <h2> and Id: {{$id}}</h2>
    </section> 
@endsection