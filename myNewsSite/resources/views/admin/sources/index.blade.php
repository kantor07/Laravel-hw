@extends('layouts.admin')
@section('content')
<h2>Список источников новостей</h2>
<a href="{{ route('admin.sources.create') }}" 
        style="float:right;" class="btn btn-primary">
        Добавить источник новостей
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
              <th scope="col">Url</th>
              <th scope="col">Дата добавления</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            @forelse($sources as $source)
            <tr>
              <td>{{ $source->id }}</td>
              <td>{{ $source->title }}</td>
              <td>{{ $source->url }}</td>
              <td>{{ $source->created_at->format('d-m-Y H:i') }}</td>
              <td><a href="{{ route('admin.sources.edit', ['source'=> $source]) }}" class="btn btn-linkt btn-sm">Ред.</a> &nbsp; 
                <form method="post" action="{{ route('admin.sources.destroy', ['source' => $source]) }}">
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
        {{ $sources->links() }}
      </div>
@endsection