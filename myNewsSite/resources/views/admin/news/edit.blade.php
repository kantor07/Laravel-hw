@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать новость</h2>

        @include('inc.message')
        <form method="post" action="{{ route('admin.news.update', ['news'=> $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <lable for="category_id">Выбрать категорию</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($news->category_id === $category->id) selected @endif>
                        {{ $category->title }}</option>
                    @endforeach
                </select>       
            </div><br>
            <div class="form-group">
                <lable for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
            </div><br>
            <div class="form-group">
                <lable for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
            </div><br>
            <div class="form-group">
                <lable for="status">Статус</label>
                <select class="form-control" name="status">
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
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
                <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
            </div><br>   
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
