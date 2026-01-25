<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudentController;

// Route::get('/', action: [SiteController::class, 'welcome']);



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

// Route::resource('/notes',NoteController::class);

Route::middleware('auth:client')->group(function(){
    Route::resource('/notes',NoteController::class)->except(['edit','put','destroy']);

    // ajout des protections specifique aux route
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->middleware('note.can:edit')->name('notes.edit');
    Route::put('/notes/{note}/edit', [NoteController::class, 'update'])->middleware('note.can:edit')->name('notes.update');
    Route::delete('/notes/{note}/delete',[NoteController::class, 'destroy'])->middleware('note.can:delete')->name('notes.destroy');

});


//route pour mon authentification(login)
Route::get('/', action: [AuthController::class, 'showLogin'])->name('showlogin');
Route::get('/login',[AuthController::class, 'showLogin'])->name('showlogin');
Route::post('/login',[AuthController::class, 'login'])->name('login');

//route pour mon authentification(register)
Route::get('/register',[AuthController::class, 'showRegister'])->name('showregister');
Route::post('/register',[AuthController::class, 'register'])->name('register');

//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// route de l'authentification qui mene au dashboard si tout est bon
Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
