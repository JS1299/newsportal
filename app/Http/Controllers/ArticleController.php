<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::select(['title', 'created_at', 'content','image'])->where('id', $id)->first();
        $neededid = Article::select('categories_id')->where('id',$id)->first();
        $category = Category::select(['category'])->where('id', $neededid->categories_id)->first();
        return view('ShowArticle')->with(['article'=>$article,
            'category'=>$category]);
    }

    public function create()
    {
        $categories = Category::select(['id','category'])->get();
//        dump($categories);
        return view('newArticle')->with(['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        //dump($request->all());
        $data = $request->all();
        $article = new Article();
        $article->fill($data);
        $article->save();
        //dump($article);
    }
}
