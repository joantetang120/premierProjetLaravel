<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', action: [SiteController::class, 'welcome']);



Route::get('/home/{nom}', [SiteController::class, 'home']);



Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/service', 'service');

Route::get('home2/{nom}/{id}' ,[UserController::class, 'home2']);

Route::get('pagetest/{email}/{password}', [UserController::class,'pagetest']);

Route::fallback(function(){
    return"this page is not found try agains";
});
