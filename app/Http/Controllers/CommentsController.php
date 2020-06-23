<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
        Comment::create([
            'comm_content' => \request('cm'),
            'article_id ' => $article->id
        ]);
        return back();
    }
}
