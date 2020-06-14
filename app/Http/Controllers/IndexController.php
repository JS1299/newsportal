<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::select(['id','title', 'category','brief_desc','content', 'image'])->get();
        //dump($articles);
        return view('mainpage')->with(['articles' => $articles]);
    }
}
