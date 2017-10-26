@extends('layouts.app')

@section('content')
<div class="container">
<h1>Here you can see all Your Cv's</h1>
<hr>
<a class="btn btn-primary" href="/cvs/create">Create New CV</a>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>user id</th>
      <th>Full name</th>
      <th>email</th>
      <th>skill</th>
      <th>experience</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cvs as $cv)
    <tr>

      <td>{{$cv->id}}</td>
      <td>{{$cv->user_id}}</td>
      <td>{{$cv->fullname}}</td>
      <td>{{$cv->user_email}}</td>
      <td>{{$cv->skill}}</td>
      <td>{{$cv->exp}} Years</td>
      <td>
       <a class="btn btn-primary" href="/cvs/{{$cv->id}}">Show</a>
       <a class="btn btn-warning" href="/cvs/{{$cv->id}}/edit">edit</a>
       <a class="btn btn-danger" href="/cvs/{{$cv->id}}/delete">delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

<hr>
<br>
<hr>
<div class="row">
  @foreach($cvs as $cv)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" >
      <img src="{{ asset('storage/' . $cv->photo) }}" alt="image">
      <div class="caption">
        <h3>{{$cv->skill}}</h3>
        <p>{{$cv->fullname}}</p>
        <a class="btn btn-primary" href="/cvs/{{$cv->id}}"><span class="glyphicon glyphicon-folder-open"  aria-hidden="true"></span>Show</a>
        <a class="btn btn-warning" href="/cvs/{{$cv->id}}/edit">edit</a>
        <a class="btn btn-danger" href="/cvs/{{$cv->id}}/delete">delete</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection
