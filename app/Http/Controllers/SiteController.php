<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function home($nom)
    {
        return view('home', data: compact('nom'));
    }
}
