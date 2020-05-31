@extends('templates.home')
@section('title', 'Edit Category')
@section('content')

@if(count($errors)>0)
  @foreach($errors->all() as $error)
    <div class="col-md-4 mx-auto">
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    </div>
  @endforeach
@endif

@if(Session::has('success'))
  <div class="col-md-4 mx-auto">
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  </div>
@endif

<form action="{{ route('tags.update', $tags->id) }}" method="post">
@csrf
@method('patch')
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="form-group">
        <label>Tag name</label>
        <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{ $tags->name }}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </div>
  </div>
</form>
@endsection
