<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleList extends Component
{
    public $reload = false;
    public $editExcerpt = null;
    public $editedExcerpt = '';
    public $currentEditArticle;

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

    public function editExcerpt($id)
    {
        $this->currentEditArticle = Article::findOrFail($id);
        $this->editedExcerpt = $this->currentEditArticle->excerpt;
        $this->editExcerpt = $id;
    }

    public function saveExcerpt()
    {
        $this->currentEditArticle->update([
            'excerpt' => $this->editedExcerpt,
        ]);
        $this->currentEditArticle->save();

        $this->resetExcerpt();
    }

    public function resetExcerpt()
    {
        $this->currentEditArticle = null;
        $this->editedExcerpt = '';
        $this->editExcerpt = null;
    }
}
