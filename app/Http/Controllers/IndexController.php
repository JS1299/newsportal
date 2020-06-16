<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::select(['id','title','categories_id','brief_desc','content', 'image'])->orderby('created_at', 'DESC')->get();
//        dump($articles);
        return view('mainpage')->with(['articles' => $articles]);
    }
}
