<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author','comm_content', 'article_id'];
    public function article()
    {
        return $this->belongsTo(Comment::class);
    }
}
