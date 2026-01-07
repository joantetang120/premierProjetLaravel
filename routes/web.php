<?php

use App\Http\Controllers\ArticleController;
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
