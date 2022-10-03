<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditeRequest;
use App\Models\Category;
use App\Models\Article;
use App\Models\Source;
use App\Queries\ArticleQueryBuilder;
use App\Services\UploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(ArticleQueryBuilder $builder)
    {
        return view('admin.articles.index', [
            'articles' => $builder->getArticles(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();

        return view('admin.articles.create', [
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param ArticleQueryBuilder $builder
     *
     * @return RedirectResponse
     */
    public function store(
        CreateRequest $request,
        ArticleQueryBuilder $builder,
        UploadService $uploadService
    ): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
         }

        $article = $builder->create($validated);

        if ($article) {
            return redirect()->route('admin.articles.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.file'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return string
     */
    public function show($id)
    {
        return "Admin/NewsController function show return";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $sources = Source::all();

        return view('admin.articles.edit', [
          //  'news' => $article,
            'article' => $article,
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditeRequest $request
     * @param Article $article
     * @param ArticleQueryBuilder $builder
     * @param UploadService $uploadService
     * @return RedirectResponse
     */
    public function update(
        EditeRequest $request,
        Article $article,
        ArticleQueryBuilder $builder,
        UploadService $uploadService
    ): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
           $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }

        if ($builder->update($article, $validated)) {
            return redirect()->route('admin.articles.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.file'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @param Log;
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        try {
            if (!$article->delete()) {
                return response()->json('error', 400);
            }

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
