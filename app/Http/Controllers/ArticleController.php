<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Display list of all articles
    public function index()
    {
        //eager loading
        $articles = Article::with('user')->orderByDesc('created_at')->paginate(5);

        //lazy loading
        //$articles = Article::all()->sortByDesc('created_at');

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

        $article->user_id = auth()->id();

        $article->save();
        return redirect(route('articles.index'))->with('status', 'Article created successfully');
    }

    // display one article
    public function show(Article $article)
    {
        return view('articles.show', ['article'=> $article]);
    }

    // return view for editing article
    public function edit(Article $article)
    {
        if ($article->user_id == auth()->id()) {
            return view('articles.edit', ['article'=> $article]);
        } else {
            return redirect(route('articles.index'))->with('status', 'Access denied');
        }
    }

    // get article by id and update with data from request
    public function update($id)
    {
        $article = Article::findOrFail($id);

        $this->validateArticle();

        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->text=request('text');

        $article->save();

        return redirect(route('article.show', $id));
    }

    //delete article from DB
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->redirectTo(route('articles.index'));
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
