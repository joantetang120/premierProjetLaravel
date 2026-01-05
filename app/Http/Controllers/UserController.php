<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    //

    public function home2($nom,$id){
        return view('home2', compact('nom','id'));
    }

    public function pagetest($email,$password){
        return view('pagetest', compact('email','password'));


    }
}
