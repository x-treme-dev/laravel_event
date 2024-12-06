<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Events\Article\Updated;
use App\Events\Article\Created;

class Article extends Model
{
    //
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'author_id'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($article) {
            event(new ArticleCreated($article));
        });

        static::updated(function ($article) {
            event(new ArticleUpdated($article));
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}


 
