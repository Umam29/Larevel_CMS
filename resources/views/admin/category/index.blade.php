@extends('templates.home')
@section('title', 'Category')
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
<a href="{{ route('category.create') }}" class="btn btn-info mb-3">Add Category</a>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $res)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $res->name }}</td>
            <td>
                <form action="{{ route('category.destroy', $res->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('category.edit', $res->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <input type="submit" class="btn btn-danger btn-sm" value="delete">
                </form>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection