@extends('layouts.main')
@section('title') Главная страница @parent @endsection
@section('content')
<div style="width: 1366px; margin: 0 auto; height: 600px;">    
    <h1>Главная</h1>
    <div style="display:flex;">
        <div class="offset-2 col-8" style=" width: 300px; height: 200px; flex-column;">
            <h5>Написать комментарий</h5>
            <form method="post" action="{{ route('comment.store') }}">
                @csrf
                <div class="form-group">
                    <lable for="name">Имя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div><br>
                <div>
                    <lable for="description">Описание комментария</lable>
                    <textarea class="form-control" name="description" id="description" value="{!! old('description') !!}"></textarea>
                </div><br>   
                <button class="btn btn-success mt-3" type="submit">Отправить</button>
            </form>
        </div>
    
        <div class="offset-2 col-8" style="width: 300px; height: 200px; flex-column;">
            <h5>Заказать новость</h5>
            <form method="post" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group">
                    <lable for="name">Имя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div><br>
                <div class="form-group">
                    <lable for="phone">Номер телефона</label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                </div><br>
                <div class="form-group">
                    <lable for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div><br>
                <div>
                    <lable for="description">Описание новости</lable>
                    <textarea class="form-control" name="description" id="description" value="{!! old('description') !!}"></textarea>
                </div><br>   
                <button class="btn btn-success mt-3" type="submit">Отправить</button>
            </form>
        </div>
    </div>  
</div>
@endsection