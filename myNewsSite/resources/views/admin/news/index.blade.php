@extends('layouts.admin')
@section('content')
<h2>Список новостей</h2>
<a href="{{ route('admin.news.create') }}" 
        style="float:right;" class="btn btn-primary">
        Добавить новость
</a>
<br>
<br>
      <div class="table-responsive">

        @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Наименование</th>
              <th scope="col">Категория</th>
              <th scope="col">Источник новостей</th>
              <th scope="col">Автор</th>
              <th scope="col">Статус</th>
              <th scope="col">Дата добавления</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            @forelse($newsList as $news)
            <tr>
              <td>{{ $news->id }}</td>
              <td>{{ $news->title }}</td>
              <td>{{ $news->category->title }}</td>
              <td>{{ $news->source->title }}</td>
              <td>{{ $news->author }}</td>
              <td>{{ $news->status }}</td>
              <td>{{ $news->created_at->format('d-m-Y H:i') }}</td>
              <td>
                <a href="{{ route('admin.news.edit', ['news'=> $news]) }}" class="btn btn-linkt btn-sm">Ред.</a> &nbsp; 
                <form method="post" action="{{ route('admin.news.destroy', ['news' => $news]) }}">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-linkt btn-sm" style="color: red;" >Уд.</button> 
                </form>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>    
            @endforelse
          </tbody>
        </table>
          {{ $newsList->links() }}
      </div>
@endsection