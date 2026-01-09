<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
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


    public function store(ArticleStoreRequest  $request){
        $request->validated();

        $article = new Article([
           'titre' => $request['titre'],
            'contenu' => $request['contenu'],
            'autheur' => $request['autheur'],
        ]);

        $article->save();

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $data = $request->validated();

        $article->update($data);

        return redirect()->route('articles.index');
    }

    public  function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }



}
