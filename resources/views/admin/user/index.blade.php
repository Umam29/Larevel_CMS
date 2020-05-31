@extends('templates.home')
@section('title', 'User')
@section('content')
@if(count($errors)>0)
  @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
  @endforeach
@endif

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
@endif
<a href="{{ route('user.create') }}" class="btn btn-info mb-3">Add User</a>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $res)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $res->name }}</td>
            <td>{{ $res->email }}</td>
            <td>
                @if($res->type)
                    <span class="badge badge-info">Administrator</span>
                @else
                    <span class="badge badge-warning">Author</span>
                @endif
            </td>
            <td>
                <form action="{{ route('user.destroy', $res->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('user.edit', $res->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <input type="submit" class="btn btn-danger btn-sm" value="delete">
                </form>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $user->links() }}
@endsection