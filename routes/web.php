<?php

use App\Http\Controllers\SiteController;
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
Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/bonjour', function() {
    return "<h1>Bonjour</h1>";
});

Route::get('/home', function () {
 return view('home');
});



Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/service', 'service');

Route::get('home2/{nom}/{id}' ,[SiteController::class, 'home2']);

Route::get('pagetest/{email}/{password}', [SiteController::class,'pagetest']);

Route::fallback(function(){
    return"this page is not found try agains";
});



