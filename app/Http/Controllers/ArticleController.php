<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::select(['title', 'created_at', 'category', 'content','image'])->where('id', $id)->first();
        return view('ShowArticle')->with(['article'=>$article]);
    }
}
