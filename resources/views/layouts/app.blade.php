<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CV.dev') }}</title>

    <!-- Styles -->

     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/vue"></script>
<style>
body {
  background-color:  #e6ffff;
  margin-top: 50px;
}
.navbar {
  background-color: #80bfff;
  font-size: 17px;
  color: black;
  font-weight: bolder;
}
.navbar a {
  background-color: #4da6ff;
  border-radius: 90px;
}
</style>



</head>
<body>
<!-- please try to run -->


        @include('layouts.navbar')

         @yield('content')


    <!-- Scripts -->


<script src="/js/app.js"></script>
</body>
</html>
