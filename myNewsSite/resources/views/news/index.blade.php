@extends('layouts.main')
@section('title') Список новостей @parent @endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @forelse($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" 
                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title></title>
                    <rect width="100%" height="100%" fill="#55595c"/>
                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news->title }}</text>
                </svg>

            <div class="card-body">
                <p class="card-text">{!! $news->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="#" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>
                </div>
                <small class="text-muted">{{ $news->author }} - {{ $news->created_at }}</small>
                </div>
            </div>
            </div>
        </div>

        @empty
        <h2>Записей нет</h2>    
        @endforelse
    </div>
@endsection
