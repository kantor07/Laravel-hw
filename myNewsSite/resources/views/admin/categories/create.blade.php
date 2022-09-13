@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить категорию</h2>

        @include('inc.message')
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <lable for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div><br>
                <lable for="description">Описание</lable>
                <textarea class="form-control" name="description" id="description" value="{!! old('description') !!}"></textarea>
            </div><br>   
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection