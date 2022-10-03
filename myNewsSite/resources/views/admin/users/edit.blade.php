@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать пользователя</h2>

        @include('inc.message')
        <form method="post" action="{{ route('admin.users.update', ['user'=> $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <lable for="name">Имя пользователя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div><br>
            <div class="form-group">
                <lable for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div><br> 
            <div class="form-group">
                <lable for="password">Пароль</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}">
            </div><br> 
            <div class="form-group">
                <lable for="is_admin">Статус</label>
                    <select class="form-control" name="is_admin">
                        <option value="1" @if($user->is_admin === 1) selected  @endif>Администратор</option>
                        <option value="0" @if($user->is_admin === 0) selected @endif>Пользователь</option>
                    </select>
            </div><br> 
              
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
