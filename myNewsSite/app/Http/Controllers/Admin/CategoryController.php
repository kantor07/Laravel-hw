<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\News;

use App\Http\Controllers\Controller;
use App\Queries\CategoryQueryBuilder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryQueryBuilder $builder)
    {
        $categories = Category::all();     
        return view('admin.categories.index', [
            'categories' => $builder->getCategory()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        CategoryQueryBuilder $builder
        )
    {
        $request->validate([
            'title'=>['required', 'string','min:5', 'max:255']
        ]);

        $category = $builder->create(
            $request->only(['title', 'description'])
        );

        if($category) {
            return redirect()->route('admin.categories.index')
            ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' =>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request, 
        Category $category,
        CategoryQueryBuilder $builder
        )
    {
        if($builder->update($category, $request->only(['title', 'description']))){
            return redirect()->route('admin.categories.index')
            ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       
        $category->delete();
           return redirect()->route('admin.categories.index')
            ->with('success', 'Запись успешно удалена');
    }
}
