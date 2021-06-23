<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Traits\UploadTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    use UploadTrait;

    // Display list of all articles
    public function index()
    {
        //eager loading
        $articles = Article::with('user')->orderByDesc('created_at')->paginate(5);

        $categories = Category::all();

        //lazy loading
        //$articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles'=>$articles, 'categories' => $categories]);
    }

    public function indexCategorized(Category $category)
    {
        $categories = Category::all();
        //get articles where category = requested category
        $categorizedArticles = Category::where('id', $category->id)->firstOrFail();

        //paginate results
        $articles = $categorizedArticles->articles()->paginate(5);

        //return view and parse articles
        return view('articles.index', ['articles'=>$articles, 'categories'=>$categories]);
    }

    // Return form for Article creation
    public function create()
    {
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }

    // Create new Article + Store in DB
    public function store()
    {
        //validate Request
        $this->validateArticle();

        //get image file
        $image = request()->file('image');

        // make image name based on title + current timestamp
        $name = Str::slug(request('title')) . '_' . time();

        // define folder path
        $folder = '/img/';

        // create filepath where image will be stored (folder + filename + extension)
        $filePath = $folder.$name.'.'.$image->getClientOriginalExtension();

        // upload image using uploadOne function from UploadTrait
        $this->uploadOne($name, $image, 'public', $folder);

        // build request array
        $requstArray = request()->all();

        // add img_url to request array
        $requstArray['img_url'] = $filePath;

        // create article from request array
        $article = $this->createFromArray($requstArray);

        if (request()->has('categories')) {
            //attach category after saving article to db
            $article->categories()->attach(request('categories'));
        }

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
            $categories = Category::all();

            $attachedCategories = $article->categories()->get();

            return view('articles.edit', ['article'=> $article, 'categories'=>$categories, 'attachedCategories'=>$attachedCategories]);
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

        $article->categories()->sync(request('categories'));

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
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function createFromArray(array $articleProps){
        $article = new Article();
        $article->title = $articleProps['title'];
        $article->excerpt = $articleProps['excerpt'];
        $article->text = $articleProps['text'];
        $article->user_id = auth()->id();
        $article->img_url = $articleProps['img_url'];
        $article->save();

        return $article;
    }
}
