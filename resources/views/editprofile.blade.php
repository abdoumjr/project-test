@extends('layouts.app')
@section('content')
  <div class="container">
<form method="post" action="/profile/{{$user->id}}" enctype="multipart/form-data">
  {{ method_field('PUT') }}
   {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input  class="form-control" placeholder="enter your fullname" name="name" value="{{$user->name}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">email</label>
    <input  class="form-control" name="email" value="{{$user->email}}">
  </div>
  <label for="">image</label>
  <input type="file" name="photo" id="photo">
  <button type="submit" class="btn btn-primary">edit</button>
</form>
  </div>
@endsection
