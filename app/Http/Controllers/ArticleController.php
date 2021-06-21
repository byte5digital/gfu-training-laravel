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
