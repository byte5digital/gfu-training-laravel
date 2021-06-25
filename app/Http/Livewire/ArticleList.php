<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleList extends Component
{
    public $reload = false;

    protected $listeners = [
        'articleStored' => 'refresh'
    ];

    public function render()
    {
        $articles = Article::with(['user', 'categories'])->orderByDesc('created_at')->paginate(5);
        return view('livewire.article-list', compact('articles'));
    }

    public function refresh()
    {
        $this->reload = !$this->reload;
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        $this->refresh();
    }
}
