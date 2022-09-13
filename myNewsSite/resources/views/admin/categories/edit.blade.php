@extends('layouts.admin')
@section('content')
<br>
    <div class="offset-2 col-8">
        <h2>Редактировать категорию</h2>
        
        @include('inc.message')
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <lable for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title"
                value="{{ $category->title }}">
            </div><br>
            <div>
                <lable for="description">Описание</lable>
                <textarea class="form-control" name="description">{!! $category->description !!}</textarea>
            </div><br>   
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection