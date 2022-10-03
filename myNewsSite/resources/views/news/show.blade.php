@extends('layouts.main')  
@section('title') Новость - {{ $articles->title }} @parent @endsection 
@section('content')
    <div style ="border: 1px solid green;">
        <h2>{{ $articles->title }}</h2>
        <p>{{ $articles->author }} - {{ $articles->created_at->format('d-m-Y H:i') }}</p>
        <p>{!! $articles->description !!}</p>
    </div>
@endsection