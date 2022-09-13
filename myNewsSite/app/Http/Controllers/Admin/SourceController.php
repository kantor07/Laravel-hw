<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditeRequest;
use App\Models\Source;
use App\Queries\SourceQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SourceQueryBuilder $builder)
    {
        return view('admin.sources.index', [
            'sources' => $builder->getSource()  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest  $request
     * @return RedirectResponse
     */
    public function store(
        CreateRequest $request, 
        SourceQueryBuilder $builder
        ): RedirectResponse
    {
        $source = $builder->create(
            $request->validated()
        );

        if($source) {
            return redirect()->route('admin.sources.index')
            ->with('success', __('messages.admin.sources.create.success'));
        }
        return back()->with('error', __('messages.admin.sources.create.fail'));
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
     *  @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditeRequest  $request
     * @param SourceQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditeRequest $request, 
        SourceQueryBuilder $builder
        ): RedirectResponse
    {        
        if($builder->update($source, $request->validated())){
        return redirect()->route('admin.sources.index')
            ->with('success', __('messages.admin.sources.update.success'));
        }
        return back()->with('error', __('messages.admin.sources.update.fail'));
      }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $source->delete();
        return redirect()->route('admin.sources.index')
         ->with('success', __('messages.admin.sources.destroy.success'));
    }
}
