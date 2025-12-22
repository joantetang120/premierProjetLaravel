<?php

use Illuminate\Support\Facades\Route;

Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/bonjour', function() {
    return "<h1>Bonjour</h1>";
});

Route::get('/home', function () {
 return view('home');
});


