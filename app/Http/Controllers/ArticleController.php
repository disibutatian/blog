<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;            //需要自己添加

class ArticleController extends Controller
{
    //
     public function index()
    {
        $articles = Article::all();
        return view('articles.index',compact('articles'));
       // return $articles;
    }
   /* public function show($id)
    {
        $article = Article::find($id);
        return $article;
    }   
   */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',compact('article'));
    }      
    public function create()
    {
        return view('articles.create');
    }
}
