<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Queries\NewsQueryBuilder;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $builder)
    {
        return view('admin.news.index', [
            'newsList' => $builder->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.create', [
            'categories'=>$categories,
            'sources'=>$sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Queries\NewsQueryBuilder $builder
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        NewsQueryBuilder $builder
        )
    {
        $news = $builder->create(
            $request->only(['category_id',
             'title', 'author', 'status', 'image', 'source_id', 'description'])
        );

        if($news) {
            return redirect()->route('admin.news.index')
            ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Admin/NewsController function show return";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @param App\Queries\NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        Request $request,
        News $news,
        NewsQueryBuilder $builder
        ) {
            if($builder->update($news, $request->only(['category_id',
                'source_id', 'title', 'author', 'status', 'image', 'description']))){
                return redirect()->route('admin.news.index')
                    ->with('success', 'Запись успешно обновлена');
                }
                return back()->with('error', 'Не удалось обновить запись');
              }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
         ->with('success', 'Запись успешно удалена');
    }
}
