<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditeRequest;
use App\Models\Category;
use App\Models\Article;
use App\Queries\CategoryQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoryQueryBuilder $builder
     * @return Response
     */
    public function index(CategoryQueryBuilder $builder)
    {
        return view('admin.categories.index', [
            'categories' => $builder->getCategory()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @param CategoryQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest $request,
        CategoryQueryBuilder $builder
        ): RedirectResponse
    {

        $category = $builder->create(
            $request->validated()
        );

        if($category->save()) {
            return redirect()->route('admin.categories.index')
            ->with('success', __('messages.admin.categories.create.success'));
        }
        return back()->with('error', __('messages.admin.categories.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return Response
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
     * @param  EditeRequest  $request
     * @param Category $category
     * @param CategoryQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditeRequest $request,
        Category $category,
        CategoryQueryBuilder $builder
        ): RedirectResponse
    {
        if($builder->update($category, $request->validated())){
            return redirect()->route('admin.categories.index')
            ->with('success', __('messages.admin.categories.update.success'));
        }
        return back()->with('error', __('messages.admin.categories.update.fail'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            if (!$category->delete()) {
                return response()->json('error', 400);
            }

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
