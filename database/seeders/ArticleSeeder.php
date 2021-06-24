<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::factory()->count(15)->create();
        $categories = Category::factory()->count(15)->create();

        foreach($articles as $article) {
            $article->categories()->sync($categories);
        }
    }
}
