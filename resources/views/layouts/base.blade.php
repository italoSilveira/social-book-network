<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href= "{{ asset('css/app.css') }}" rel="stylesheet">
    <link href= "{{ asset('bootstrap/css/modern-business.css') }}" rel="stylesheet">   
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Some titles, i dont know yet</title>
</head>
<body>
  @include('layouts.navbar')
  <br>
  <div id="app">
  	@yield('body')
  <div>
</body>
</html>