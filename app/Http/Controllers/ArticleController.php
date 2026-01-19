<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::get();
//        $articles = Article::latest()->get();
        $articles = Article::paginate(2);
        return view('articles.index', compact('articles'));

    }

    public function create()
    {
        return view('articles.create');
    }


    public function store(ArticleStoreRequest  $request){
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('photos_articles', 'public');
            $data['image'] = $path;
        }

        $data['user_id'] = auth('client')->id();


        $article = new Article([
           'titre' => $request['titre'],
            'contenu' => $request['contenu'],
            'autheur' => $request['autheur'],
            'image' => $data['image'] ?? null,
            'user_id' => $data['user_id'] ?? null,
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

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $path = $request->file('image')->store('photos_articles', 'public');
            $data['image'] = $path;
        }

        $article->update($data);

        return redirect()->route('articles.index');
    }

    public  function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }



}
