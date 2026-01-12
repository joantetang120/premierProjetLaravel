<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudentController;

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
