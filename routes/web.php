<?php

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;


Route::get('/', action: [SiteController::class, 'welcome']);



Route::get('/home/{nom}', [SiteController::class, 'home']);



Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/service', 'service');

Route::get('/home2/{nom}/{id}' ,[UserController::class, 'home2']);

Route::get('/pagetest/{email}/{password}', [UserController::class,'pagetest']);

Route::fallback(function(){
    return"this page is not found try agains";
});

// Routes pour les articles
// 1. Recup des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
// 2. Routes pour creer
Route::get('/article_create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/article_create', [ArticleController::class, 'store'])->name('articles.store');
// 3. Routes pour editer
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/article/{article}/edit', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.destroy');


Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');


// Routes pour les produits
// 2. Recup des produits
Route::get('/produits', [ProduitController::class, 'index'])->name('Produits.index');


// Affiche le formulaire
Route::get('/produits/creer', [ProduitController::class, 'create'])->name('produits.create');

// Enregistre le produit dans la base de données
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

// Mise à jour
Route::get('/produits/{id}/modifier', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');

// Suppression
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

