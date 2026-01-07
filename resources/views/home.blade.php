@extends('layout.app')

@section('title', 'Home page')

@section('body')
    <h1>Ceci est la home page</h1>  
    <p>Mon nom est: {{ $nom }}</p>
@endsection

@section('scripts')
    const home = 'home'
@endsection
