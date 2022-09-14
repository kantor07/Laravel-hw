<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = app(Article::class)->getNews();
        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    public function show(int $id)
    {
        //return current news
        $news = app(Article::class)->getNews($id);
        return view('news.show', [
            'news' => $news
        ]);
    }
    public function category()
    {
        //list all category
        $categoryNews = app(Category::class)->getCategories();
        return view('sitePage.categoryNewsPage', [
            'newsCategoryList' => $categoryNews
        ]);
    }

}
