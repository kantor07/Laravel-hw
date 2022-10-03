<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        //list all category
        $categoryList = Category::query()->paginate(9);
        return view('sitePage.categoryNewsPage', [
            'categoryList' => $categoryList
        ]);
    }
}
