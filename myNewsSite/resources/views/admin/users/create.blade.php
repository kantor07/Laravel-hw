@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить пользователя</h2>

        @include('inc.message')
        <form method="post" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <lable for="name">Имя пользователя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div><br>
            <div class="form-group">
                <lable for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div><br> 
            <div class="form-group">
                <lable for="password">Пароль</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ old ('password') }}">
            </div><br>
            <div class="form-group">
                <lable for="is_admin">Статус</label>
                    <select class="form-control" name="is_admin">
                        <option @if(old('is_admin') === 1) selected @endif value= "1">Администратор</option>
                         <option @if(old('is_admin') === 0) selected @endif value= "0">Пользователь</option>
                    </select>
            </div><br>    
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection