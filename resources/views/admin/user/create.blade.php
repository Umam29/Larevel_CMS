@extends('templates.home')
@section('title', 'Add User')
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

<form action="{{ route('user.store') }}" method="post">
@csrf
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="form-group">
        <label>Type</label>
            <select class="form-control" name="type" id="type">
                <option value="" holder>Select Type</option>
                <option value="0">Author</option>
                <option value="1">Administrator</option>
            </select>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </div>
  </div>
</form>
@endsection