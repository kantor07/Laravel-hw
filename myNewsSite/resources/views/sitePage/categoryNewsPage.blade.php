@extends('layouts.main')
@section('title') Категории новостей @parent @endsection
@section('content')
    
    <h1>Все новости</h1>
    <br><hr>
    @foreach($newsCategoryList as $newsCategory)
    <br>
        <div>
            <h2><a href="#">{{ $newsCategory->title }}</a></h2>
        </div><br><hr>
    @endforeach
@endsection 