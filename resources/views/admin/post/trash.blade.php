@extends('templates.home')
@section('title', 'Trash Post')
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
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trash as $res)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $res->title }}</td>
            <td>{{ $res->category->name }}</td>
            <td>
                @foreach($res->tags as $tag)
                    <ul>
                        <li>{{ $tag->name }}</li>
                    </ul>
                @endforeach
            </td>
            <td><img src="{{ asset($res->image) }}" class="img-thumbnail" width="200"></td>
            <td>
                <form action="{{ route('posts.kill', $res->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('posts.restore', $res->id) }}" class="btn btn-primary btn-sm">Restore</a>
                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $trash->links() }}
@endsection