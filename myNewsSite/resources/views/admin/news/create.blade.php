@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить новость</h2>
            
        @include('inc.message')
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <lable for="category_id">Выбрать категорию</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id') === $category->id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>       
            </div><br>
            <div class="form-group">
                <lable for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div><br>
            <div class="form-group">
                <lable for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
            </div><br>
            <div class="form-group">
                <lable for="status">Статус</label>
                <select class="form-control" name="status">
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div><br>
            <div class="form-group">
                <lable for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div><br>
            <div class="form-group">
                <lable for="source_id">Выбрать источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    <option value="0">Выбрать</option>
                    @foreach($sources as $source)
                    <option value="{{ $source->id }}" @if(old('source_id') === $source->id) selected @endif>{{ $source->title }}</option>
                    @endforeach
                </select>       
            </div><br>
            <div class="form-group">
                <lable for="description">Описание</lable>
                <textarea class="form-control" id="description" name="description" value="{!! old('description') !!}"></textarea>
            </div><br>   
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection