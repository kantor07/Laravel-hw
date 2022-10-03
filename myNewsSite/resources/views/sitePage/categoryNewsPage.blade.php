@extends('layouts.main')
@section('title') Категории новостей @parent @endsection
@section('content')
    
    <h1>Все новости</h1>
    <br><hr>
    @forelse($categoryList as $newsCategory)
    <br>
        <div>
            <h2><a href="#">{{ $newsCategory->title }}</a></h2>
        </div><br><hr>
    @endforeach
    <br><br>
    {{ $categoryList->links() }}
@endsection 