@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить источник новостей</h2>

        @include('inc.message')
        <form method="post" action="{{ route('admin.sources.store') }}">
            @csrf
            <div class="form-group">
                <lable for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div><br>
            <div class="form-group">
                <lable for="url">Url</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
            </div><br>   
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection