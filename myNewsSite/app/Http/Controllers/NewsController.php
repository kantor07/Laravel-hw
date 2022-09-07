<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = app(News::class)->getNews();
        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    public function show(int $id)
    {
        //return current news
        $news = app(News::class)->getNews($id);
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
