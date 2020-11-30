<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ArticleApiController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ArticleResource
     */
    public function store(Request $request)
    {
        $article = Article::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);

        return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return ArticleResource
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->user()->id !== $article->user_id) {
            return response()->json(['error' => 'You can only edit your own articles.'], 403);
        }

        $article->update($request->only(['title', 'excerpt', 'body']));

        return new ArticleResource($article);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return void
     * @throws Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);

    }
}
