@extends('layouts.app')
@section('content')

<div class="container">
      <div class="panel-group">
  <div class="panel panel-primary">
      <div class="panel-heading">edit Cv</div>

<form method="post" action="/cvs/{{$cv-> id}}">
  {{ method_field('PUT') }}
   {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Full name</label>
    <input  class="form-control" placeholder="enter your fullname" name="fullname" value="{{$cv->fullname}}">
  </div>
  <div class="form-group">
    <label >Skill</label>
    <input lass="form-control"  placeholder="Your skill here" name="skill" value="{{$cv->skill}}">
  </div>
  <div class="form-group">
    <label >Experience</label>
    <input lass="form-control"  placeholder="Your exp by years" name="exp" value="{{$cv->exp}}"> Years.
  </div>
  <button type="submit" class="btn btn-primary">edit</button>
</form>
  </div>

</div>
</div>
</div>
@endsection
