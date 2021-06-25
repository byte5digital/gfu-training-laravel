<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $categories;
    public $article;
    public $articleImage;
    public $selectedCategories;

    protected $rules = [
        'article.title' => 'required|string|min:5|max:255',
        'article.excerpt' => 'required',
        'article.text' => 'required',
        'articleImage' => 'image|required',
        'selectedCategories' => 'array|nullable',
    ];

    public function mount()
    {
        $this->article = new Article();
        $this->selectedCategories = [];
    }

    public function render()
    {
        return view('livewire.create-article');
    }

    public function storeArticle()
    {
        $this->validate();

    }
}
