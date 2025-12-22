<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', action: [SiteController::class, 'welcome']);



Route::get('/home/{nom}', [SiteController::class, 'home']);


