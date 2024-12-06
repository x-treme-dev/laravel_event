<?php

namespace App\Listeners;

 
use App\Events\ArticleCreated;
use App\Models\Category;

class UpdateCategoryArticleCount
{
    /**
     * Create the event listener.
     */
    public function handle(ArticleCreated $event)
    {
        $category = Category::find($event->article->category_id);
        if ($category) {
            $category->increment('article_count');
        }
    }
}
