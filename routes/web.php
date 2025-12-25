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

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);

