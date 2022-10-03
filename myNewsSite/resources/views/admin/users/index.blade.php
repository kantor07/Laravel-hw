@extends('layouts.admin')
@section('content')
<h2>Список пользователей</h2>
<a href="{{ route('admin.users.create') }}" 
        style="float:right;" class="btn btn-primary">
        Добавить пользователя
</a>
<br>
<br>
      <div class="table-responsive">

        @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя пользователя</th>
              <th scope="col">Email</th>
              <th scope="col">is_admin</th>
              <th scope="col">Дата добавления</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->is_admin }}</td>
              <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
              <td>
                <a href="{{ route('admin.users.edit', ['user'=> $user]) }}" class="btn btn-linkt btn-sm">Ред.</a> &nbsp; 
                <a class="delete text-red btn btn-linkt btn-sm" style="color: red" data-id="{{ $user->id }}">Уд.</a>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>    
            @endforelse
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
@endsection
@push('js')
  <script type="text/javascript">
    let id
    $('.delete').click(function(e) {
      e.preventDefault()

      id = $(this).attr('data-id')
      
      $.ajax({
        url: `/admin/users/${id}`,
        data: {
          '_token': '{{ csrf_token() }}'
        },
        type: 'DELETE',
        success: function(response) {
          location.reload()
        },
        error: function(response) {
          alert("Удаление отменено")
        }
      })
    })
   
    async function send(url) {
      let response = await fetch(url, {
        method:'DELETE',
        data: {
            '_token' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'id' : id
        },
      });

      let result = await response.json();
      return result.ok;
    }
  </script>
@endpush 