<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        //protects all functions in controller with middleware 'auth' except index and show
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all articles by created_at desc and paginate
        $articles = Article::latest('created_at')->paginate(5);

        //return view with articles
        return view('articles.index', compact('articles'));
    }

    /**
     * Display a listing of the resource with the requested tag
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexTagged(Tag $tag)
    {
        //find articles where tag name = requested tag name
        $taggedArticles = Tag::where('id', $tag->id)->firstOrFail();

        //paginate
        $articles = $taggedArticles->articles()->paginate(3);

        //return view with articles
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all tags from DB
        $tags = Tag::all();

        //return view with tags
        return view('articles.create', compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate article
        $this->validateArticle();

        //generates new article w request data
        $article = new Article(request(['title', 'excerpt', 'body']));
        //set user_id in article to id of currently logged in user
        $article->user_id = auth()->id();
        //save article to DB
        $article->save();


        if (request()->has('tags')) {
            //attach tags after saving article to DB
            //NOTE: to remove tags use detach() method
            $article->tags()->attach(request('tags'));

        }

        //return redirect to view with status in session
        return redirect(route('articles.index'))->with('status', 'Article successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find article with id or return 404
        $article = Article::findOrFail($id);
        //return view with article
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find article with id or return 404
        $article = Article::findOrFail($id);
        //return view with article
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //find article with id or return 404
        $article = Article::findOrFail($id);

        //validate article
        $this->validateArticle();

        //set title, excerpt, body to values from request
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        //save changes to DB
        $article->save();

        //return redirect to view with status in session
        return redirect(route('articles.show', $id))->with('status', 'Article successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        //find article with id or return 404
        $article = Article::findOrFail($id);

        //delete article from DB
        $article->delete();

        //return redirect to view with status in session
        return redirect(route('articles.index'))->with('status', 'Article deleted successfully.');
    }


    /**
     * Validate Article
     *
     * @return array
     */
    public function validateArticle()
    {
        //using Laravel's validate function
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);

    }

}
