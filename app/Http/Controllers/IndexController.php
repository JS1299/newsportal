<?php

namespace App\Http\Controllers;
use App\article;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $articles = article::select(['id','title', 'category','brief_desc','content']);
    }
}
