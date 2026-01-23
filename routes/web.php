<?php

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;


Route::get('/', action: [AuthController::class, 'showLogin'])->name('showlogin');
// AUTH FLOW
// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('showregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');




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

Route::middleware('auth:client')->group(function(){
    // 1. Recup des articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
});

// 2. Routes pour creer
Route::get('/article_create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/article_create', [ArticleController::class, 'store'])->name('articles.store');
// 3. Routes pour editer
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('article.can:edit')->name('articles.edit');
Route::put('/article/{article}/edit', [ArticleController::class, 'update'])->middleware('article.can:edit')->name('articles.update');
Route::delete('/article/{article}/delete', [ArticleController::class, 'destroy'])->middleware('article.can:delete')->name('articles.destroy');


Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');


// Routes pour les produits
// 2. Recup des produits
Route::get('/produits', [ProduitController::class, 'index'])->name('Produits.index');


// Affiche le formulaire
Route::get('/produits/creer', [ProduitController::class, 'create'])->name('produits.create');

// Enregistre le produit dans la base de données
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

//recuperation des etudiants

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// creation de ma routes pour mes product(crud)
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/product/create',[ProductController::class, 'create'])->name('products.create');
// Route::post('/product',[ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// raccouci de mes 7 routes ( crud) pour product

Route::resource('/products',ProductController::class);

// raccouci de mes 7 routes ( crud) pour note

Route::resource('/notes',NoteController::class);
