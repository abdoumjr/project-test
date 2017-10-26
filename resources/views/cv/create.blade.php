@extends('layouts.app')
@section('content')
<div class="container">
<div class="panel-group">
<div class="panel panel-primary">
<div class="panel-heading">Informations</div>
<div class="panel-body">


  <div class="container">
<form method="post" action="/cvs"  enctype="multipart/form-data">
   {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Full name</label>
    <input  class="form-control" placeholder="enter your fullname" name="fullname">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">SKill</label>
    <input  class="form-control" placeholder="enter your skill" name="skill">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Experience</label>
    <input  class="form-control" placeholder="enter your experience by years" name="exp">
  </div>


  <label for="">image</label>
  <input type="file" name="photo" id="photo">
  <br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>


</div>
</div>
</div>
@endsection
