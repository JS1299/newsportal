<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'categories_id', 'brief_desc', 'content', 'image'];
    /**
     * @var mixed
     */

    public function comments()
    {
        return $this->hasMany('App\Article');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }
    public function addComment($body)
    {
        Comment::create([
            'body' => $body,
            'article_id' => $this->id
        ]);

    }

}
