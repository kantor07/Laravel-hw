@extends('layouts.admin')
@section('content')
    <h2>Список категорий</h2>
    <a href="{{ route('admin.categories.create') }}" 
        style="float:right;" class="btn btn-primary">
        Добавить категорию
    </a>
    
    <br><br>
    <div class="table-responsive">
      @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Наименование</th>
              <th scope="col">Дата добавления</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            @forelse($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->title }}</td>
              <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
              <td>
                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-linkt btn-sm">Ред.</a> 
                <form method="post" action="{{ route('admin.categories.destroy', ['category' => $category]) }}">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-linkt btn-sm" style="color: red;" >Уд.</button> 
                </form>
              </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">Записей не найдено</td>
                </tr>    
            @endforelse
          </tbody>
        </table>
        {{ $categories->links() }}
      </div>
@endsection    