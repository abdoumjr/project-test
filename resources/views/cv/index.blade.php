@extends('layouts.app')

@section('content')
<div class="container">
<h1>Here you can see all the Cv's</h1>
<hr>
<div class="row">
@foreach($cvs as $cv)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ asset('storage/' . $cv->photo) }}" alt="image">
      <div class="caption">
        <h3>{{$cv->skill}}</h3>
        <p>{{$cv->fullname}}</p>
        <a href="/cvs/{{$cv->id}}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-folder-open"  aria-hidden="true"></span>Read</a>
        <a href="/profile/{{$cv->user_id}}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>profile</a>
      </div>
    </div>
  </div>
@endforeach
</div>
</div>
@endsection
