<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditeRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


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
     * @param  CreateRequest  $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest $request,
        NewsQueryBuilder $builder
        ): RedirectResponse
    {
        $news = $builder->create(
            $request->validated()
        );

        if($news) {
            return redirect()->route('admin.news.index')
            ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.file'));
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
     * @param  EditeRequest  $request
     * @param  News $news
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditeRequest $request,
        News $news,
        NewsQueryBuilder $builder
        ): RedirectResponse
    {
        if($builder->update($news, $request->validated())){
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
            }
            return back()->with('error', __('messages.admin.news.update.file'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $deleted = $news->delete();
            if($deleted === false) {
                return \response()->json('error', 400);
            }

            return \response()->json('ok');

        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return \response()->json('error', 400);
        }
    }
}
