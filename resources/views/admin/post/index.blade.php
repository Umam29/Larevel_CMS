@extends('templates.home')
@section('title', 'Post')
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
<a href="{{ route('posts.create') }}" class="btn btn-info mb-3">Add Post</a>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Author</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post as $res)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $res->title }}</td>
            <td>{{ $res->category->name }}</td>
            <td>
                @foreach($res->tags as $tag)
                    <ul>
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    </ul>
                @endforeach
            </td>
            <td>{{ $res->users->name }}</td>
            <td><img src="{{ asset($res->image) }}" class="img-thumbnail" width="100"></td>
            <td>
                <form action="{{ route('posts.destroy', $res->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('posts.edit', $res->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                </form>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $post->links() }}
@endsection