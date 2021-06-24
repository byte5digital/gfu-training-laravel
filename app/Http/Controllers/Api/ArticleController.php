<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ArticleStoreRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::all());
    }

    public function store(ArticleStoreRequest $request)
    {
        $article = Article::create($request->validated());

        return response()->json([
            'message' => 'Article successfully created.',
            'article' => $article,
        ], 200);
    }
}
