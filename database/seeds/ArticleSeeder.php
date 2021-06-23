<?php

use App\Category;
use App\Article;
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
        // generate 15 articles
        $articles = factory(Article::class, 15)->create();

        //generate 3 categories
        $categories = factory(Category::class, 3)->create();

        //add all 3 categories to each article
        foreach($articles as $article){
            $article->categories()->sync($categories);
        }
    }
}
