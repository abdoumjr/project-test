@extends('layouts.app')
@section('content')
  <div class="container">
<div id="app">
<cv :userid="{{$user}}"></cv>
<exp :expid="{{$user}}"></exp>
 </div>
 </div>
<!-- please run watch -->
@endsection
