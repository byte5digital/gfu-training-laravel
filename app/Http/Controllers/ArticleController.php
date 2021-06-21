<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Display list of all articles
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', compact('articles'));
    }


    // Return form for Article creation
    public function create()
    {
        return view('articles.create');
    }

    // Create new Article + Store in DB
    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'text']));
        $article->save();
        return redirect(route('articles.index'))->with('status', 'Article created successfully');
    }

    // display one article 
    public function show(Article $article)
    {
        return view('articles.show', ['article'=> $article]);
    }

    // return view for editing article
    public function edit(Article $article){

        return view('articles.edit', ['article'=> $article]);
    }

    // get article by id and update with data from request
    public function update($id){

        $article = Article::findOrFail($id);

        $this->validateArticle();

        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->text=request('text');

        $article->save();

        return redirect(route('article.show', $id));

    }

    // validates Article
    public function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:5'],
            'excerpt' => 'required',
            'text' => 'required',
        ]);
    }
}
