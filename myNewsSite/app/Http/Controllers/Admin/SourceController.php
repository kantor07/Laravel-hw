<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Queries\SourceQueryBuilder;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SourceQueryBuilder $builder)
    {
        $sources = Source::all();     
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request, 
        SourceQueryBuilder $builder
        )
    {
        $source = $builder->create(
            $request->only(['title', 'url'])
        );

        if($source) {
            return redirect()->route('admin.sources.index')
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
     * @param  \Illuminate\Http\Request  $request
     * @param Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request, 
        Source $source,
        SourceQueryBuilder $builder
        )
    {        
        if($builder->update($source, $request->only(['title', 'url']))){
        return redirect()->route('admin.sources.index')
            ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
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
         ->with('success', 'Запись успешно удалена');
    }
}
