<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    use UploadTrait;

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
        $this->authorize('create', Article::class);
        $categories = Category::select(['id','category'])->get();
//        dump($categories);
        return view('newArticle')->with(['categories'=>$categories]);
    }

    public function store(Request $request)
    {
//        dump($request->all());
        $data = $request->all();
        $article = new Article();
        $article->fill($data);

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('title')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
//            dd($filePath);
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $article->image = $filePath;
        }

//        $article->fill($data);
//        dd($article);
        $article->save();
    }
}
