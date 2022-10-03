<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;




class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::query()->paginate(9);
        return view('news.index', [
            'articlesList' => $articles
        ]);
    }

    public function show(Article $article)
    {
        return view('news.show', [
            'articles' => $article
        ]);
    }

}
