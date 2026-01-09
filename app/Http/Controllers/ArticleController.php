<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::get();
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));

    }

    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request){
        $request->validate([
            'titre' => 'required|min:5',
            'contenu' => 'required|max:20',
            'autheur' => 'required|max:10',
        ]);

        $article = new Article([
           'titre' => $request['titre'],
            'contenu' => $request['contenu'],
            'autheur' => $request['autheur'],
        ]);

        $article->save();

        return redirect()->route('articles.index');
    }



}
