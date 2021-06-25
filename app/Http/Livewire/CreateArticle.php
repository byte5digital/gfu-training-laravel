<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $categories;
    /** @var Article $article */
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
        $this->clearFields();
    }

    public function render()
    {
        return view('livewire.create-article');
    }

    public function storeArticle()
    {
        $this->validate();

        $imagePath = $this
            ->articleImage
            ->store('public/article_images');
        $imagePath = str_replace('public/', '', $imagePath);

        $this->article->user_id = auth()->id();
        $this->article->img_url = $imagePath;
        $this->article->save();

        if($this->selectedCategories) {
            $this->article->categories()->sync($this->selectedCategories);
        }

        $this->clearFields();
        $this->emit('articleStored');
    }

    public function clearFields()
    {
        $this->article = new Article();
        $this->articleImage = null;
        $this->selectedCategories = [];
    }
}
