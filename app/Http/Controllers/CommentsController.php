<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->fill($data);
        $comment->article_id = $id;
        $comment->save();
        return back();
    }
}
