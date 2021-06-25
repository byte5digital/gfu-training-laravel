<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Eager loading
        $articles = Article::with(['user', 'categories'])->orderByDesc('created_at')->paginate(5);

        $categories = Category::select([
            'id', 'name'
        ])->get();

        // Lazy loading
        // $articles = Article::all()->sortByDesc('created_at');

        return view('article.index', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
}
