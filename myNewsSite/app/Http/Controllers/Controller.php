<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function getNews(int $id = null): array
    // {
    //     $news = app(News::class)->getNews($id);
    //     return view('admin.news.index', [
    //         'news' => $news
    //     ]);

    //    // $news = [];
    //    // $faker = Factory::create();

    //     // if($id) {
    //     //     return [
    //     //         'title'         => $faker->jobTitle(),
    //     //         'author'        => $faker->userName(),
    //     //         'status'        =>'DRAFT',
    //     //         'description'   =>$faker->text(100),
    //     //         'created_at'    =>now('Europe/Moscow')
    //     //     ];
    //     // }

    //     // for($i=1; $i<10; $i++) {
    //     //     $news[$i] = [
    //     //         'title'         => $faker->jobTitle(),
    //     //         'author'        => $faker->userName(),
    //     //         'status'        =>'DRAFT',
    //     //         'description'   =>$faker->text(100),
    //     //         'created_at'    =>now('Europe/Moscow')
    //     //     ];
    //    //}

    //     return $news;
    // }

    // public function getCategoryNews(int $id = null): array
    // {

    //     $categoriesNews = app(Category::class)->getCategories();
    //     return view('admin.categories.index', [
    //         'categories' => $categories
    //     ]);

    //     // $categoryNews = [];
    //     // $faker = Factory::create();

    //     // if($id) {
    //     //     return [
    //     //         'title' => $faker->jobTitle()
    //     //     ];
    //     // }

    //     // for($i=1; $i<10; $i++) {
    //     //     $categoryNews[$i] = [
    //     //         'title' => $faker->jobTitle()
    //     //     ];
    //     // }

    //     return $categoryNews;
    // }
}
