@extends('templates.home')
@section('title', 'Edit Post')
@section('content')

@if(count($errors)>0)
  @foreach($errors->all() as $error)
    <div class="col-md-6 mx-auto">
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    </div>
  @endforeach
@endif

@if(Session::has('success'))
  <div class="col-md-6 mx-auto">
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  </div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('patch')
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label>Category</label>
            <select class="form-control select2" name="category_id" id="category_id">
                <option value="" holder>Select Category</option>
                @foreach($category as $res)
                <option value="{{ $res->id }}" 
                @if($post->category_id == $res->id)
                selected
                @endif
                >{{ $res->name }}</option>
                @endforeach
            </select>
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea>
      </div>
      <div class="form-group">
            <label>Tags</label>
            <select class="form-control select2" multiple="" name="tags[]">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}"
                @foreach($post->tags as $val)
                    @if($tag->id == $val->id)
                        selected
                    @endif
                @endforeach
                >{{ $tag->name }}</option>
                @endforeach
            </select>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </div>
  </div>
</form>

<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

                <script>
                        CKEDITOR.replace( 'content' );
                </script>
@endsection
