<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Comment;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use \Auth;

class ArticleController extends Controller
{
    use UploadTrait;

    public function show($id)
    {
        $article = Article::select(['title', 'created_at', 'content','image'])->where('id', $id)->first();
        $comments = Comment::select(['comm_content', 'created_at'])->orderby('created_at', 'DESC')->where('article_id', $id)->get();
//        dd($comments);
        $neededid = Article::select('categories_id')->where('id',$id)->first();
        $category = Category::select(['category'])->where('id', $neededid->categories_id)->first();
        return view('ShowArticle')->with(['article'=>$article,
            'comments'=>$comments,
            'category'=>$category,
            'id'=>$id]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        $categories = Category::select(['id','category'])->get();
//        dump($categories);
        return view('newArticle')->with(['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $article = new Article();
        $article->fill($data);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->input('title')).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $article->image = $filePath;
        }

        $article->save();

//        $articles = Article::select(['id','title','categories_id','brief_desc','content', 'image'])->orderby('created_at', 'DESC')->get();
//        return view('mainpage')->with(['articles' => $articles]);
        return redirect('/');
    }

    public function delete(\App\Article $article)
    {
        $this->authorize('create', Article::class);
//        $article_del = Article::where('id', $article)->first();
//        dump($article_del);
        $deleteAllComment = Comment::select()->where('article_id', $article->id)->delete();
        $article->delete();
        return redirect('/');
    }

    public function showArticleEdit(\App\Article $article)
    {
        $this->authorize('create', Article::class);
        $categories = Category::select(['id','category'])->get();
//        dump($categories);
        return view('updateArticle')->with(['categories'=>$categories,
            'article'=>$article
        ]);
    }

    public function updateArticle(Request $request, \App\Article $article)
    {
        $this->authorize('create', Article::class);

        $data = request()->validate([
            'title' => 'required',
            'categories_id' => 'required',
            'brief_desc' => 'required',
            'content' => 'required',
            'image' => '',
        ]);

//        dd($article);
        $data = $request->all();

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->input('title')).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $data['image'] = $filePath;
        }

        $article->update($data);
//        $articles_tmp = Article::select(['id','title','categories_id','brief_desc','content', 'image'])->orderby('created_at', 'DESC')->get();
        return redirect('/');
    }
}
