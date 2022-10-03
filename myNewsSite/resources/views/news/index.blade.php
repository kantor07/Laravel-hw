@extends('layouts.main')
@section('title') Список новостей @parent @endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @forelse($articlesList as $article)
        <div class="col">
            <div class="card shadow-sm">
                
                <img src="{{ Storage::disk('public')->url($article->image) }}" style="width: 300px">

            <h2>{{ $article->title }}</h2>
            <div class="card-body">
                <p class="card-text">{!! $article->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('news.show', ['article' => $article]) }}" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>
                </div>
                <small class="text-muted">{{ $article->author }} - {{ $article->created_at }}</small>
                </div>
            </div>
            </div>
        </div>

        @empty
        <h2>Записей нет</h2>    
        @endforelse      
    </div>
    <br><br>
    {{ $articlesList->links() }}
@endsection

