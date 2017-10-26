@extends('layouts.app')

@section('content')

<div class="container">
      <div class="panel-group">
  <div class="panel panel-primary">
      <div class="panel-heading">Informations</div>
    <div class="panel-body">
      <p >CV id : <strong>{{$cv->id}}</strong></p>
      <p>user id : <strong>{{$cv->user_id}}</strong></p>
      <p>Full name : <strong>{{$cv->fullname}}</strong></p>
      <p>Email: <strong>{{$cv->user_email}}</strong></p>
      <p>Skill : <strong>{{$cv->skill}}</strong></p>
      <p>Experience : <strong>{{$cv->exp}}</strong></p>

    <img src="{{ asset('storage/' . $cv->photo) }}" alt="storage/profile.png" style="hight: 300px; width: 300px" >

    </div>
  </div>
</div>

@endsection
